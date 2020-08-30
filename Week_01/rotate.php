<?php
//旋转数组
class Solution {
    //1.暴力：翻转k次
    public function rotate1(&$nums, $k) {
        $len = count($nums);
        for ($i = 0; $i < $k; $i++) {
            for ($j = 0; $j < $len; $j++) {
                $pre = $nums[$len - 1];
                $nums[$len - 1] = $nums[$j];
                $nums[$j] = $pre;
            }
        }
        return $nums;
    }

    //2.新数组
    public function rotate2(&$nums, $k) {
        $arr = [];
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            $arr[($i + $k) % $len] = $nums[$i];
        }
        ksort($arr);
        $nums = $arr;
        return $nums;
    }


    //3.使用环状替换
    public function rotate3(&$nums, $k) {
        $length = count($nums);
        $k = $k % $length;
        $count = 0;
        for ($start = 0; $count < $length; $start++) {
            $current = $start;
            $prev = $nums[$start];//1
            do {
                //获取当前坐标的下一个步伐坐标
                $next = ($current + $k) % $length;

                //获取下一个正确坐标的数存起来
                $temp = $nums[$next];

                //把当前坐标数字移动到下个正确坐标
                $nums[$next] = $prev;

                //把下一个坐标的值给当前
                $prev = $temp;

                //把下一个坐标给当前坐标
                $current = $next;
                $count++;
            } while($start != $current);
        }
        return $nums;
    }
}
$test = new Solution();
$nums = [1,2,3,4,5,6,7];
$k = 3;
$r1 = $test->rotate1($nums, $k);
print_r($r1);

$nums = [1,2,3,4,5,6,7];
$r2 = $test->rotate2($nums, $k);
print_r($r2);

$nums = [1,2,3,4,5,6,7];
$r3 = $test->rotate3($nums, $k);
print_r($r3);

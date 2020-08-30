<?php
//��ת����
class Solution {
    //1.��������תk��
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

    //2.������
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


    //3.ʹ�û�״�滻
    public function rotate3(&$nums, $k) {
        $length = count($nums);
        $k = $k % $length;
        $count = 0;
        for ($start = 0; $count < $length; $start++) {
            $current = $start;
            $prev = $nums[$start];//1
            do {
                //��ȡ��ǰ�������һ����������
                $next = ($current + $k) % $length;

                //��ȡ��һ����ȷ�������������
                $temp = $nums[$next];

                //�ѵ�ǰ���������ƶ����¸���ȷ����
                $nums[$next] = $prev;

                //����һ�������ֵ����ǰ
                $prev = $temp;

                //����һ���������ǰ����
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

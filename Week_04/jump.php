<?php
/**
 * PHP version 7
 * jump.php
 * @info 跳跃游戏
 * @author Daisy
 * @date 2020/9/26 10:34 AM
 */
class Solution
{
    function jump($nums) {
        // 数组有2个以上元素,必须跳一次
        $count = 0;
        $end = 0;
        $max_pos = 0;
        for ($i = 0; $i < count($nums) - 1; $i++) {
            $max_pos = max($max_pos, $nums[$i] + $i);
            if ($end == $i) {
                $end = $max_pos;
                $count++;
            }
        }

        return $count;
    }
}

$object = new Solution();
$nums = [2, 3, 1, 1, 4];
$res = $object->jump($nums);
var_dump($res);
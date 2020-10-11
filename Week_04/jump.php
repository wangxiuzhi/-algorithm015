<?php
/**
 * PHP version 7
 * jump.php
 * @info ��Ծ��Ϸ
 * @author Daisy
 * @date 2020/9/26 10:34 AM
 */
class Solution
{
    function jump($nums) {
        // ������2������Ԫ��,������һ��
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
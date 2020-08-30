<?php
//两数之和 a+b=9 => b=9-a
class Solution {
    function twoSum($nums, $target) {
        $found = [];
        $count = count($nums);
        for ($i = 0; $i < $count; $i++) {
            $diff = $target - $nums[$i];
            if (array_key_exists($diff, $found)) {
                return [$found[$diff], $i];
            }
            $found[$nums[$i]] = $i;
        }
    }
}

$test = new Solution();
$nums = [2, 7, 11, 15];
$target = 9;
$result = $test->twoSum($nums, $target);
print_r($result);
<?php
//删除排序数组中的重复项
class Solution
{
    public function removeDuplicate(&$nums) {
        $len = count($nums);
        if ($len < 1) {
            return $len;
        }

        //双指针 快慢指针
        $slow = 0;
        for ($fast = 1; $fast < $len; ++$fast) {
            if ($nums[$fast] != $nums[$slow]) {
                $slow++;
                //减少不必要的原地交换
                if ($slow != $fast) {
                    $nums[$slow] = $nums[$fast];
                }
            }
        }
        return $slow + 1;
    }
}

$test = new Solution();
$nums = array(0,0,1,1,1,2,2,3,3,4);
$uniqueArr = $test->removeDuplicate($nums);
print_r($uniqueArr);
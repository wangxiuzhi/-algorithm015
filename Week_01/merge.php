<?php
//合并两个有序数组
function merge(&$nums1, $m, &$nums2, $n) {
    $nums = array_merge(array_slice($nums1, 0, $m), array_slice($nums2, 0, $n));
    sort($nums);
    return $nums;
}
$nums1 = [1,2,3,0,0,0]; //m = 3
$nums2 = [2,5,6];       //n = 3
print_r(merge($nums1, 3, $nums2, 3));

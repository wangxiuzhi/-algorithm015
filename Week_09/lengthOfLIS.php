<?php
/**
 * PHP version 7
 * lengthOfLIS.php
 * @info
 * @author Daisy
 * @date 2020/11/9 12:25 AM
 */
class Solution {
    function lengthOfLIS($nums) {
        $len = count($nums);
        if ($len <= 1) return $len;

        // dp ����ĺ��壬��ʾ  [0,...,i] �Ӵ��� LIS��������󷵻� max(dp) ����
        $dp = array_fill(0, $len, 1);
        for ($i = 1; $i < $len; ++$i) {
            // i �ǵ�ǰ�±꣬j �Ǳ� i С�������±�
            for ($j = 0; $j < $i; ++$j) {
                if ($nums[$j] < $nums[$i]) {
                    $dp[$i] = max($dp[$i], $dp[$j] + 1);
                }
            }
        }

        return max($dp);
    }
}

$obj = new Solution();
echo $obj->lengthOfLIS([10,9,2,5,3,7,101,18]);
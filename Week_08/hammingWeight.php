<?php
/**
 * PHP version 7
 * haimingWeight.php
 * @info
 * @author Daisy
 * @date 2020/11/9 12:14 AM
 */
class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {
        $bStr = decbin($n);
        $arr = str_split($bStr);
        $r = array_count_values($arr);
        return isset($r[1]) ? $r[1] : 0;
    }
}

$obj = new Solution();
echo $obj->hammingWeight(00000000000000000000000000001011);
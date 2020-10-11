<?php
/**
 * PHP version 7
 * longestCommonSubsequence.php
 * @info 最长公共子序列
 * @author Daisy
 * @date 2020/10/11 11:49 PM
 */
class Solution {

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {

        $m = strlen($text1);
        $n = strlen($text2);
        $dp[0][0] = 0;

        for ($i=1; $i <= $m; $i++) {
            $dp[0][$i] = 0;
        }

        for ($i=1; $i <= $n; $i++) {
            $dp[$i][0] = 0;
        }

        for ($i=0; $i < $m; $i++) {
            for ($j=0; $j < $n; $j++) {
                if($text1[$i] == $text2[$j]) {
                    $dp[$i + 1][$j + 1] = $dp[$i][$j] + 1;
                }else{
                    $dp[$i + 1][$j + 1] = max($dp[$i + 1][$j], $dp[$i][$j + 1]);
                }
            }
        }

        return $dp[$m][$n];
    }
}
$obj = new Solution();
$res = $obj->longestCommonSubsequence('abcde', 'ace');
var_dump($res);
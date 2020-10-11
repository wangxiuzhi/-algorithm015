<?php
/**
 * PHP version 7
 * uniquePaths.php
 * @info ²»Í¬Â·¾¶ dp[i, j] = dp[i-1][j] + dp[i][j-1]
 * @author Daisy
 * @date 2020/10/11 11:48 PM
 */
class Solution
{
    function uniquePaths($m, $n) {
        $dp = [];
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($i == 1 || $j == 1) {
                    $dp[$i][$j] = 1;
                } else {
                    $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
                }
            }
        }
        return $dp[$m][$n];
    }
}
$obj = new Solution();
$res = $obj->uniquePaths(3, 2);
var_dump($res);

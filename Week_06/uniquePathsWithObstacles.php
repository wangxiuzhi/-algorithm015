<?php
/**
 * PHP version 7
 * uniquePathsWithObstacles.php
 * @info 不同路径II 有障碍物
 * @author Daisy
 * @date 2020/10/11 11:48 PM
 */
class Solution {

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid) {
        // dp
        $rowCount = count($obstacleGrid);
        $columnCount = count($obstacleGrid[0]);
        $result = [];
        if ($obstacleGrid[0][0] == 1 || $obstacleGrid[$rowCount - 1][$columnCount - 1] == 1) {
            return 0;
        }

        $result[0][0] = 1;
        // the first column
        for ($i = 1; $i < $rowCount; ++$i) {
            $result[$i][0] = ($obstacleGrid[$i][0] == 1 || $result[$i - 1][0] == 0) ? 0 : 1;
        }

        // the first row
        for ($j = 1; $j < $columnCount; ++$j) {
            $result[0][$j] = ($obstacleGrid[0][$j] == 1 || $result[0][$j - 1] == 0) ? 0 : 1;
        }

        // others
        for ($i = 1; $i < $rowCount; ++$i) {
            for ($j = 1; $j < $columnCount; ++$j) {
                if ($obstacleGrid[$i][$j] == 1) {
                    $result[$i][$j] = 0;
                } else {
                    $result[$i][$j] = $result[$i - 1][$j] + $result[$i][$j - 1];
                }
            }
        }
        return $result[$rowCount - 1][$columnCount - 1];
    }
}

$obj = new Solution();
$obstacleGrid = array(
    array(0,0,0),
    array(0,1,0),
    array(0,0,0),
);
$res = $obj->uniquePathsWithObstacles($obstacleGrid);
var_dump($res);
<?php
/**
 * PHP version 7
 * findCircleNum.php
 * @info
 * @author Daisy
 * @date 2020/11/8 11:49 PM
 */
class Solution {
    /**
     * @param Integer[][] $M
     * @return Integer
     */
    function findCircleNum($M) {
        $count = 0;
        $vis = array_fill(0,sizeof($M),0);
        $queue = [];
        for ($i = 0;$i< sizeof($M);$i++){
            if($vis[$i] == 0){
                array_push($queue,$i);
                while (!empty($queue)){
                    $s = array_shift($queue);//出队
                    $vis[$s] = 1;
                    for ($j = 0;$j<sizeof($M);$j++){
                        if($M[$s][$j] == 1 && $vis[$j] == 0){
                            array_push($queue,$j);//元素入队-继续搜索
                        }
                    }
                }
                $count++;
            }
        }

        return $count;
    }
}

$obj = new Solution();
$arr = [[1,1,0],
    [1,1,0],
    [0,0,1]];
echo $obj->findCircleNum($arr);
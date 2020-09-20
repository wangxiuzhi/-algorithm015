<?php

/**
 * PHP version 7
 * Class Solution
 * @info 给定两个整数n和k, 返回1...n中所有可能的k个数的组合 不能重复
 *       思路：回溯算法
 * @author Daisy
 * @date 2020/9/20 7:22 PM
 */
class Solution {
    protected $result = [];
    function combine($n, $k)
    {
        if ($n <0 || $k <= 0 || $k > $n) {
            return [];
        }
        $this->helper($n, $k, [], 1);
        return $this->result;
    }

    private function helper($n, $k, $list, $start)
    {
        if (count($list) == $k) {
            $this->result[] = $list;
            return;
        }

        //此时剩余可选数字个数 $n-$i+1
        //所需数字个数 $k - count($list)
        for ($i = $start; $n - $i + 1 >= $k - count($list); ++$i) {
            $list[] = $i;
            $this->helper($n, $k, $list, $i + 1);
            array_pop($list);
        }
    }
}

$obj = new Solution();
$res = $obj->combine(4, 2);
echo "<pre>";print_r($res);die;

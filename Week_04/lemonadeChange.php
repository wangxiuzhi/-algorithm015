<?php
/**
 * PHP version 7
 * lemonadeChange.php
 * @info ÄûÃÊË®ÕÒÁã
 * @author Daisy
 * @date 2020/10/11 11:13 PM
 */
class Solution {
    function lemonadeChange($bills) {
        $five = $ten = 0;
        for ($i = 0; $i < count($bills); $i++) {
            if ($bills[$i] == 5) {
                $five++;
                continue;
            }

            if ($bills[$i] == 10) {
                if ($five > 0) {
                    $five--;
                    $ten++;
                }else {
                    return false;
                }
            } else {
                if ($five > 0 && $ten > 0) {
                    $five--;
                    $ten--;
                } elseif ($five >= 3) {
                    $five -= 3;
                } else {
                    return false;
                }
            }
        }

        return true;
    }
}

$obj = new Solution();
$bills = array(5,5,5,10,20);
$res = $obj->lemonadeChange($bills);
var_dump($res);

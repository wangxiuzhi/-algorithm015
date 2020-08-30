<?php
//ÒÆ¶¯Áã
function moveZero($nums)
{
    foreach($nums as $key => $val){
        if($val == 0){
            unset($nums[$key]);
            array_push($nums, 0);
        }
    }
    return $nums;
}

print_r(moveZero([0,1,0,3,12]));
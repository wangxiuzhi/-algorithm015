<?php
//¼ÓÒ»
function plusOne($digits) {
    $length = count($digits);
    $digits[$length - 1] +=1;
    for ($i = $length - 1; $i > 0; --$i) {
        if ($digits[$i] >= 10) {
            $digits[$i] -= 10;
            $digits[$i - 1] += 1;
        }
    }

    if ($digits[0] >= 10) {
        $digits[0] -= 10;
        array_unshiit($digits, 1);
    }
    return $digits;
}

print_r(plusOne([1,2,3]));
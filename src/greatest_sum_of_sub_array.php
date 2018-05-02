<?php


function getGreatestSumOfSubArray($arr) {
    $max = $temp = $arr[0];
    $len = count($arr);
    for ($i = 1; $i < $len ; $i++) {
        if ($temp < 0) {
            $temp = $arr[$i];
        } else {
            $temp += $arr[$i];
        }
        if ($temp > $max) {
            $max = $temp;
        }
    }

    return $max;
}
$arr = [6, -3, 18, -5, 1, 3, 19];

echo getGreatestSumOfSubArray($arr);

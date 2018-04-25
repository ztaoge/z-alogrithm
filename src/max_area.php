<?php

/**
 * 非负整数$arr, 其下标和值够成一条线垂直于水平x轴的线段，求其中2个线段所构成的容器，能装满水的最大面积
 * tip:贪心法，二分
 */

function maxArea($arr) {
    $left = 0;
    $right = count($arr) - 1;
    $max = 0;

    while ($left < $right) {
        $temp = min($arr[$left], $arr[$right]) * ($right - $left);
        if ($temp > $max) {
            $max = $temp;
        }
        if ($arr[$left] > $arr[$right]) {
            $right--;
        } else {
            $left++;
        }
    }

    return $max;
}


$arr = [3, 1, 5];
echo maxArea($arr);

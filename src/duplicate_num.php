<?php

/**
 * 在一个长度为n的数组里的所有数字都在0到n-1的范围内。 
 * 数组中某些数字是重复的，但不知道有几个数字是重复的。
 * 也不知道每个数字重复几次。请找出数组中任意一个重复的数字。
 */
function duplicate($arr, &$duplication) {
    foreach ($arr as $item) {
        if (in_array($item, $arr)) {
            $duplication = $item;
            return true;
        }
    }
    return false;
}

$arr = [2, 3, 1, 0, 2, 5, 3];
var_dump(duplicate($arr, $duplication), $duplication);

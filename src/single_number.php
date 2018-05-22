<?php

/**
 * 给定一个非空整数数组，除了某个元素只出现一次以外，
 * 其余每个元素均出现两次。找出那个只出现了一次的元素。
 * 
 * 可以使用异或的方式，两个相同的数异或值为0，然后最终异或的值即为那个值
 *
 */

function singleNumber($arr) {
    $len = count($arr);
    $t = $arr[0];
    for ($i = 1; $i < $len; $i++) {
        $t ^= $arr[$i];
    }

    return $t;
}

$arr = [4, 1, 2, 1, 2];
echo singleNumber($arr);

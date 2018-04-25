<?php

/**
 * 最长回文子串
 */

function checkIsPalindromicString($str) {
    $len = strlen($str);
    $left = $right = '';
    if ($len % 2 == 0) {
        $left = substr($str, 0, $len/2);
        $right = substr($str, $len/2); 
    } else {
        $left = substr($str, 0, intval($len/2));
        $right = substr($str, intval($len/2)+1);
    }

    if ($left == strrev($right)) {
        return true;
    }
    return false;
}

function longestPalindromicString($str) {
    $len = strlen($str);
    $s = $len;
    while ($s) {
        $subCnt = $len - $s + 1;
        for ($i = 0; $i < $subCnt; $i++) {
            $substr  = substr($str, $i, $s);
            if (checkIsPalindromicString($substr)) {
                return $substr;
            }
        }
        $s--;
    }
    return '';
}

$str = 'abaccbbaaabb';
echo longestPalindromicString($str);
    


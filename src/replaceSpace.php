<?php

/**
 * 请实现一个函数，将一个字符串中的空格替换成“%20”。
 * 例如，当字符串为We Are Happy.则经过替换之后的字符串为We%20Are%20Happy。
 */

function replaceSpace($str) {
    $replace = '%20';
    $len = strlen($str);
    $target = '';

    for ($i = 0; $i < $len; $i++) {
        if ($str[$i] == ' ') {
            $target .= $replace;
        } else {
            $target .= $str[$i];
        }
    }

    return $target;
}

echo replaceSpace('We Are Happy');

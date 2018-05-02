<?php

/**
 * 输入n个整数，找出最小的k个数
 */

function getLeastNumber($input, $k) {
    $len = count($input);
    $karr = array_slice($input, 0, $k);
    maxHeap($karr);

    for ($i = $k; $i < $len; $i ++) {
        if ($input[$i] < $karr[0]) {
            $karr[0] = $input[$i];
            maxHeap($karr);
        }
    }

    return $karr;
}

//最大堆
function maxHeap(&$arr) {
    $len = count($arr);
    // 最后一个父节点
    $latestParentIndex = floor($len/2) - 1;
    for ($i = $latestParentIndex; $i >= 0; $i--) {
        $node = $arr[$i];
        $left = $arr[$i * 2 + 1];
        $right = $arr[$i * 2 + 2] ?? $left;
        if ($left >= $right && $left > $node) {
            $arr[$i] = $left;
            $arr[$i * 2 + 1] = $node;
        }
        if ($right > $left && $right > $node) {
            $arr[$i] = $right;
            $arr[$i * 2 + 2] = $node;
        }
    }
}

function printHeap($arr) {
    $len = count($arr);
    $i = 0;
    $depth = 1;
    $max = 0;
    for ($i = 0; $i < $len; $i++) {
        if ($i <= $max) {
            echo $arr[$i] . " ";
        } else {
            echo "\n";
            $max = $max * 2 + 2;
            echo $arr[$i] . " ";
        }
    }
    echo "\n";
}


//测试用例
$k = 7;
$arr = [31, 2, 3, 4, 50, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
// $k = 4;
// $arr = [4,5,1,6,2,7,3,8];
$result = getLeastNumber($arr, $k);
var_dump($result);








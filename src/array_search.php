<?php

/**
 * 在一个二维数组中，每一行按照从左到右递增的顺序排序，每一列都按照从上到下递增的顺序排序。
 * 请完成一个函数，输入这样的一个二维数组和一个整数，判断数组中是否含有该整数。
 */

function find($target, $arr) {
    $rowCnt = count($arr, 0);
    $colCnt = count($arr, 1) / $rowCnt - 1;

    $row = 0;
    $col = $colCnt-1;

    while ($row <= $rowCnt-1  && $col >= 0) {
        if ($arr[$row][$col] == $target) {
            return true;
        }
        //如果右上角的数大于目标值的话，移除右上角所在的当前列，来到下列右上角
        if ($arr[$row][$col] > $target) {
            $col--;
            continue;
        }
        //如果右上角的数小于目标值的话，移除右上角所在的当前行，来到下行左上角
        if ($arr[$row][$col] < $target) {
            $row++;
            continue;
        }
    }
    return false;
}

$target1 = 1;
$arr1 = [
    [1, 2, 4, 6, 8],
    [2, 5, 9, 10, 11],
    [3, 6, 10, 12, 13],
    [9, 10, 15, 16, 17]
];

$target2 = 7;
$arr2 = [[1,2,8,9],[2,4,9,12],[4,7,10,13],[6,8,11,15]];

var_dump(find($target1, $arr1));
var_dump(find($target2, $arr2));


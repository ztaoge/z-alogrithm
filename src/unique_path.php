<?php

/**
 * 在一个m x n 的网格，有一个机器人每次只能向下或者向右移动，
 * 求从左上角到右下角有几种不同的路径
 *
 * 此题类似爬楼梯问题，运用了动态规划的算法
 * f(n, m) = f(n-1, m) + f(n, m-1)
 */

//使用递归的方式
function getRoute($n, $m) {
    if ($n == 1 || $m == 1) {
        return 1;
    }

    return getRoute($n-1, $m) + getRoute($n, $m-1);
}

echo getRoute(3, 2);


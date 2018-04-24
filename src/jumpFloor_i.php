<?php

/**
 * 一只青蛙一次可以跳上1级台阶，也可以跳上2级...也可以跳上n级。
 * 求跳n级台阶有几种跳法。
 *
 * 根据数学归纳法
 * f(0) = 1
 * f(0) = 1
 * f(2) = f(1) + f(0) = 2
 * f(3) = f(2) + f(1) + f(0) = 4
 * f(4) = f(3) + f(2) + f(1) + f(0) = 8
 *
 * f(4) = f(3) + f(3)
 * 可推出f(n) = 2(n-1)
 */

function jumpFloori($num) {
    if ($num == 1 || $num == 0) {
        return 1;
    }

    return jumpFloori($num-1) * 2;
}

echo jumpFloori(5);

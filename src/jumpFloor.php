<?php

/**
 * 一只青蛙一次可以跳上1级台阶，也可以跳上2级。
 * 求该青蛙上一个n级的台阶总共有多少种跳法。
 */

function jumpFloor($num) {
    if ($num == 1 || $num == 0) {
        return 1;
    }

    // 第n级台阶共有 最后跳1级的总次数+最后跳2级的总次数
    return jumpFloor($num - 1) + jumpFloor($num - 2);
}

echo jumpFloor(4);

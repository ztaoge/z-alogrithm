<?php

/**
 * 不使用乘法和除法来实现两数相除
 * 可以使用计算多少个除数相加能得到出被除数的方法
 * 由于被除数可能很大，可以让除数每次翻一倍的方法来逼近被除数
 * 由于可能存在翻倍的最终值不到被除数的值，所以在使用此种办法来计算差值里的商
 */

function divide($dividend, $divisor) {
    $quotient = 0;
    $temp = $dividend;

    while ($temp > 0) {
        $sum = $divisor;
        $cnt = 1;
        while ($sum < $divisor) {
            if ($sum + $sum >= $temp) {
                break;
            }
            $sum += $sum;
            $cnt += $cnt;
        }
        $temp -= $sum;
        if ($temp <= 0) {
            break;
        }
        $quotient += $cnt;
    }

    return $quotient;
}

$dividend = 10001;
$divisor = 5;
echo $dividend / $divisor."\n";
echo divide($dividend, $divisor);

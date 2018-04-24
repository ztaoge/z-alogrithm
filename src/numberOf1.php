<?php

function numberOf1($n) {
    $total = 0;
    do {
        if ($n & 1 == 1) {
            $total++;
        }
    } while ($n = $n >> 1);

    return $total;
}
         
echo numberOf1(7);

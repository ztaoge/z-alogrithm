<?php

/**
 * 给定一个只包含数字的字符串，求该字符串所能组成的ipv4地址的所有解
 * 可以使用分治法，每次分别截取1到3位字符，然后再递归的求后面的子串能否构成ip地址
 */

function restoreIpAddresses($str, $offset, $ipStr, $cnt) {
    if ($cnt == 5) {
        return;
    }
    if ($cnt == 4 && $offset == strlen($str)) {
        echo $ipStr . "\n";
    }
    
    //每一次截取1或2或3位看看能不能构成ip的1字节
    for ($i = 1; $i <=3; $i++) {
        $ip = $ipStr;
        $off = $offset;
        $part = substr($str, $off, $i);
        $c = $cnt;
        if (!$part) {
            return;
        }
        //如果这部分的第一位是0的话，那这个ip地址怎么也就构不成了
        if (substr($part, 0, 1) == '0') {
            return;
        }
        if ($part > 255) {
            return;
        }
        // 成功
        $off += $i;
        if ($ip == '') {
            $ip = $part;
        } else {
            $ip .= '.'.$part;
        }
        $c += 1;
        restoreIpAddresses($str, $off, $ip, $c);
    }
}

$str = "25525511135";
$str = '1901234';
restoreIpAddresses($str, 0, '', 0);

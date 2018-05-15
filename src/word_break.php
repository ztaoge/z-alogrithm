<?php

/**
 * 给定一个非空字符串s和一个包含非空单词列表的字典dict，
 * 判断s是否可以被空格拆分成一个或多个字段中出现单词
 * 
 * 使用动态规划的算法，维护一个dp数组，记录到第i个子串是否能满足单词分隔
 * j表示到0->i， dp[j]即s子串s[j:i]是否满足单词分隔
 * 正常的dp演算，满足条件的字符串其上个分隔单词和该单词前的子串也满足条件
 * dp[i] = dp[j] && in_array(strsub(s, j, i), dict)
 */

function wordBreak($str, $dict) {
    $len = strlen($str);
    if ($len == 0 || empty($dict)) {
        return false;
    }
    //dp数组
    $dp = array_fill(0, $len, false);
    //空白子串
    $dp[0] = true;
    for ($i = 1; $i < $len; $i++) {
        //此循环是为了找出符合前dp[j]为true，且能j后面能截出一个字典单词
        for ($j = 0; $j <= $i; $j++) {
            $s = substr($str, $j, $i);
            if ($dp[$j] == true && in_array($s, $dict)) {
                $dp[$i] = true;
                break;
            }
        }
    }

    return $dp[$len];
}


$str = 'leetcode';
$dict = ['leet', 'code'];

var_dump(wordBreak($str, $dict));




































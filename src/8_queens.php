<?php

/**
 * 8皇后问题
 * 规则8*8的棋盘上摆8个皇后，各个皇后之间不能互相伤害，即各个皇后不再同一行、同一列、或者是同一对角线
 * 解法使用了深度优先搜索（dfs），从第一行开始，自上而下的求每个皇后的摆放位置
 */
class Solution {
    public $arr = [];
    public $row = 8;
    public $col = 8;
    public $solution = 0;    

    public function dfs($currentRow) {
        for ($currentCol = 0; $currentCol < $this->col; $currentCol++) {
            if ($this->isOk($currentRow, $currentCol)) {
                $this->arr[$currentRow] = $currentCol;
                if ($currentRow != $this->row - 1) {
                    //echo $currentRow . '-'. $currentCol."\n";
                    $this->dfs($currentRow+1);
                } else {
                    $this->solution += 1;
                    $this->display();
                }
            }
        }
    }

    //检查当前的位置能否摆放皇后
    public function isOk($currentRow, $currentCol) {
        for ($i = 0; $i < $currentRow; $i++) {
            if ($this->arr[$i] == $currentCol || ($currentRow - $i) == abs(($this->arr[$i] - $currentCol))) {
                return false;
            }
        }
        return true;
    }

    //display
    public function display() {
        return;
        foreach ($this->arr as $row => $col) {
            for ($i = 0; $i < $this->col; $i++) {
                if ($i == $col) {
                    echo 1 . " ";
                } else {
                    echo 0 . " ";
                }
            }
            echo "\n";
        }
        echo "\n\n";
    }
}

$sol = new Solution;
$sol->dfs(0);
echo $sol->solution;


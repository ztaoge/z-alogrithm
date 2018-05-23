<?php

/**
 * 给定一个二叉树，判断它是否是高度平衡的二叉树。
 * 一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过1。
 *
 * 使用了深度优先搜索，从底部向上检查是否满足平衡二叉树
 * 每次检查时都调用计算节点的高度
 */

class Node {
    public $val;
    public $lchild = null;
    public $rchild = null;
    public function __construct($val) {
        $this->val = $val;
    }
}

class Solution {
    public $isBalance = true;
    // 检查当前节点是否满足平衡条件
    public function checkBalance($root) {
        if (!$root) {
            return true;
        }
        if (!$this->checkBalance($root->lchild)) {
            return false;
        }
        if (!$this->checkBalance($root->rchild)) {
            return false;
        }
        $ldepth = $this->depth($root->lchild);
        $rdepth = $this->depth($root->rchild);
        if (abs($ldepth - $rdepth) > 1) {
            return false;
        }
        return true;
    }
    // 计算当前节点的高度
    public function depth($root) {
        if (!$root) {
            return 0;
        }
        $height = max($this->depth($root->lchild), $this->depth($root->rchild));

        return $height + 1;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);
$node6 = new Node(6);
$node7 = new Node(7);

$node1->lchild = &$node2;
$node1->rchild = &$node3;
$node2->lchild = &$node4;
$node2->rchild = &$node5;
$node4->lchild = &$node6;
$node4->rchild = &$node7;

$solution = new Solution();
var_dump($solution->checkBalance($node1));

$node1->lchild = &$node2;
$node1->rchild = &$node3;
$node2->lchild = &$node4;
$node2->lchild = &$node5;
$node3->lchild = &$node6;
$node3->lchild = &$node7;

var_dump($solution->checkBalance($node1));


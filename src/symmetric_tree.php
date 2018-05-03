<?php

/**
 * 判断一个二叉树是否是镜像二叉树
 * 主要用了递归的思想，
 * 每个节点左子树的左子树与右子树的右子树互为镜像，左子树的右子树和右子树的左子树互为镜像
 */

$arr = [1, 2, 2, 3, 4, 4, 3, 5];

class Node {
    public $left = null;
    public $right = null;
    public $val = null;
    public function __construct($val) {
        $this->val = $val;
    }
}

$root = new Node(1);
$node1 = new Node(2);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(4);
$node6 = new Node(3);
$node7 = new Node(5);

$root->left = &$node1;
$root->right = &$node2;
$node1->left = &$node3;
$node1->right = &$node4;
$node2->left = &$node5;
$node2->right = &$node6;
$node3->left = &$node7;

//使用对象的形式
function isSymmetric1($left, $right) {
    if ($left == null && $right == null) {
        return true;
    } 
    if ($left == null && $right != null || $left != null && $right == null) {
        return false;
    }
    if ($left->val == $right->val) {
        return isSymmetric1($left->left, $right->right);
        return isSymmetric1($left->right, $right->left);
    } else {
        return false;
    }
}
var_dump(isSymmetric1($node1, $node2));

//使用数组的形式
function isSymmetricTree($arr) {
    $left = 1;
    $right = 2;
    return isSymmetric($left, $right, $arr); 
}
function isSymmetric($left, $right, $arr) {
    if (!isset($arr[$left]) && !isset($arr[$right])) {
        return true;
    }
    if (!isset($arr[$left]) && isset($arr[$right]) || isset($arr[$left]) && !isset($arr[$right])) {
        return false;
    }
    if ($arr[$left] == $arr[$right]) {
        return isSymmetric(2 * $left + 1, 2 * $right + 2, $arr);
        return isSymmetric(2 * $left + 2, 2 * $right + 1, $arr);
    } else {
        return false;
    }
}
$arr = [1, 2, 2, 3, 4, 4, 3, 5];
var_dump(isSymmetricTree($arr));

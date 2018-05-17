<?php

/**
 * 从前序与中序遍历序列构造二叉树
 *        3
 *       / \
 *      9   20
 *     / \
 *    15  7
 *
 *  pre_order: 3, 9, 20, 15, 7
 *  in_order: 9, 3, 15, 20, 7
 *
 * 可以从先序遍历对照中序遍历，看出根节点，左右子树
 * 然后递归的左右两子树
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
    public function buildTree($preOrder, $inOrder) {
        //找到每层的根节点
        foreach ($preOrder as $k1 => $v1) {
            foreach ($inOrder as $k2 => $v2) {
                if ($v1 == $v2) {
                    $rootVal = $v1;
                    $rootOffset = $k1;
                    $mid = $k2;
                    break 2;
                }
            }
        }

        //中序遍历的数组，分隔成左右两子树
        $preOrder = array_slice($preOrder, $rootOffset + 1);
        $root = new Node($rootVal);
        $left = array_slice($inOrder, 0, $mid);
        $right = array_slice($inOrder, $mid+1);

        //构造左子树
        if (count($left) == 1) {
            $lchildVal = array_shift($left);
            $lchild = new Node($lchildVal);
            $root->lchild = &$lchild;
        } elseif (count($left) > 1) {
            $root->lchild = $this->buildTree($preOrder, $left);
        }

        //构造右子树
        if (count($right) == 1) {
            $rchildVal = array_shift($right);
            $rchild = new Node($rchildVal);
            $root->rchild = &$rchild;
        } elseif (count($right) > 1) {
            $root->rchild = $this->buildTree($preOrder, $right);
        }

        return $root;
    }
}

$solution = new Solution();
$preOrder = [3, 9, 29, 15, 7];
$inOrder = [9, 3, 15, 20, 7];
$solution->buildTree($preOrder, $inOrder);

var_dump($solution->root);






























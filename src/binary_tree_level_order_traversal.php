<?php

/**
 * 二叉树层级遍历
 * 主要使用了BFSG广度优先算法，将每一次遍历出来的结果放如队列中，接着遍历
 * 因为需要展示层级关系，在每一层遍历结束之后加上#号来表示此层已经遍历结束
 * 队列每一次运行#时，就表示已经遍历完上一层节点的所有当前子节点，就接着往队列里头加入#
 */

class Node {
    public $value;
    public $left = null;
    public $right = null;
    public function __construct($value) {
        $this->value = $value;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);
$node6 = new Node(6);
$node7 = new Node(7);
$node8 = new Node(8);
$node9 = new Node(9);

$node1->left = &$node2;
$node1->right = &$node3;
$node2->left = &$node4;
$node2->right = &$node5;
$node3->left = &$node6;
$node4->left = &$node7;
$node4->right = &$node8;


function levelOrder($root) {
    $queue = new \SplQueue;
    $queue->enqueue($root);
    $queue->enqueue('#');

    $cnt = 1;
    $arr = [];
    $arr[] = [$root->value];
    $tmp = [];
    while (!$queue->isEmpty()) {
        $curr = $queue->dequeue();

        if ($curr == '#') {
            //检查队列里是否还有节点
            if (!$queue->isEmpty()) {
                $queue->enqueue('#');
                $arr[] = $tmp;
                $tmp = [];
            }
            continue;
        }
        if ($curr->left) {
            $tmp[] = $curr->left->value;
            $queue->enqueue($curr->left);
            $cnt++;
        }
        if ($curr->right) {
            $tmp[] = $curr->right->value;
            $queue->enqueue($curr->right);
            $cnt++;
        }

    }

    return $arr;
}


var_dump(levelOrder($node1));


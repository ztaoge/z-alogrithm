<?php

class Node {
    public $val;
    public $lchild = null;
    public $rchild = null;
    public function __construct($val) {
        $this->val = $val;
    }
}

$node1 = new Node(3);
$node2 = new Node(9);
$node3 = new Node(20);
$node4 = new Node(15);
$node5 = new Node(7);

$node1->lchild = &$node2;
$node1->rchild = &$node3;
$node3->lchild = &$node4;
$node3->rchild = &$node5;

// 先序遍历
function preOrderTraversal(Node $root) {
    echo $root->val;
    if ($root->rchild) {
        preOrderTraversal($root->lchild);
    }
    if ($root->rchild) {
        preOrderTraversal($root->rchild);
    }
}

// 中序遍历
function inOrderTraversal(Node $root) {
    if ($root->lchild) {
        inOrderTraversal($root->lchild);
    }
    echo $root->val;
    if ($root->rchild) {
        inOrderTraversal($root->rchild);
    }
}

// 后序遍历
function postOrderTraversal(Node $root) {
    if ($root->lchild) {
        inOrderTraversal($root->lchild);
    }
    if ($root->rchild) {
        inOrderTraversal($root->rchild);
    }
    echo $root->val;
}

preOrderTraversal($node1);
echo "\n";
inOrderTraversal($node1);
echo "\n";
postOrderTraversal($node1);  //9, 15, 20, 7, 3

$t1 = new Node(20);
$t2 = new Node(15);
$t3 = new Node(7);
$t4 = new Node(8);
$t5 = new Node(4);
$t6 = new Node(1);
$t7 = new Node(3);
$t1->lchild = &$t2;
$t1->rchild = &$t3;
$t3->lchild = &$t4;
$t3->rchild = &$t5;
$t5->lchild = &$t6;
$t5->rchild = &$t7;
echo "\n";
postOrderTraversal($t1);

$a1 = new Node('A');
$a2 = new Node('B');
$a3 = new Node('C');
$a4 = new Node('D');
$a5 = new Node('E');
$a6 = new Node('F');
$a7 = new Node('G');
$a1->lchild = &$a2;
$a1->rchild = &$a3;
$a2->lchild = &$a4;
$a2->rchild = &$a5;
$a3->lchild = &$a6;
$a3->rchild = &$a7;
echo "\n";
postOrderTraversal($a1);
<?php

/**
 * 反转链表
 * 已有链表A->B->C->D->E 将其翻转成 E->D->C->B->A
 * 可以使用递归的方法
 * f(B)->next = A;  A->next = null;
 * f(C)->next = B;  B->next = null;
 * ...
 *
 */

class Node {
    public $val;
    public $next = null;
    public function __construct($val) {
        $this->val = $val;
    }
}

class Solution {
    public $head;
    public function reversList($node) {
        if ($node->next == null) {
            $this->head = &$node;
            return $node;
        }
        $tmp = $this->reversList($node->next);
        $tmp->next = &$node;
        $node->next = null;

        return $node;
    }
}

$n1 = new Node(1);
$n2 = new Node(2);
$n3 = new Node(3);
$n4 = new Node(4);
$n5 = new Node(5);
$n1->next = &$n2;
$n2->next = &$n3;
$n3->next = &$n4;
$n4->next = &$n5;

$solution = new Solution;
$solution->reversList($n1);
$head = $solution->head;
while($head) {
    echo $head->val . "\n";
    $head = $head->next;
}

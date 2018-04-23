<?php

$arr = [1, 2, 2, 3, 4, 4, 3];

$depth = sqrt($arr + 1);
$currentDepth = 1;
$parent = null;
$root = new \StdClass;
$root->data = $arr[0];
$root->left = null;
$root->right = null;
foreach ($arr as $node) {
    if ($currentDepth == 1) {
        continue;
    }
    $childNum = pow(2, $currentDepth);
    while ($childNum--) {

    }
}

$dataMap = [];
foreach ($arr as $item) {
    $node = new \StdClass;
    $node->left = null;
}
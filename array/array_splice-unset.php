<?php

// 键值数组
$arr = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
];

unset($arr['b']);
var_dump($arr); // 'a' => 1, 'c' => 3

$arr = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
];

array_splice($arr, 1, 1);
var_dump($arr); // 'a' => 1, 'c' => 3

// 索引数组
$arr = ['a', 'b', 'c'];

unset($arr[1]); // 不会重排索引
var_dump($arr); // 0 => 'a', 2 => 'c

$arr = ['a', 'b', 'c'];

array_splice($arr, 1, 1); // 重排索引
var_dump($arr); // 0 => 'a', 1 => 'c

<?php

// 键值数组
$a = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
];
$b = [
    'd' => 4,
    'b' => 5,
    'e' => 6,
];
// 键重复，后面的覆盖前面的
var_dump(array_merge($a, $b)); // 'a' => 1, 'b' => 5, c' => 3, 'd' => 4, 'e' => 6
// 键重复，保留前面的
var_dump($a + $b); // 'a' => 1, 'b' => 2, c' => 3, 'd' => 4, 'e' => 6

// 索引数组
$a = [1, 2, 3, 4, 5];
$b = [5, 4, 10];
// 所有的值都要，重排索引
var_dump(array_merge($a, $b)); //0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 5, 5 => 5, 6 => 4, 7 => 10
// 相同索引的，保留前面的数组的值
var_dump($a + $b); // 0 => 1, 1 => 2, 2 => 3, 3 => 4, 5 => 5
var_dump($b + $a); // 0 => 5, 1 => 4, 2 => 10, 3 => 4, 5 => 5

<?php

// 引用传递一个数组
function test(&$array, $key, $value)
{
    // 这里如果直接赋值，则是将引用的数据区直接替换值
    // $array = $key;

    // 这里是重新创建了一个引用，$array 和 $a 的引用断掉了
    // 变为了 $key 数据区的引用
    $array = &$key;
}

$a = ['a1'=>1, 'a2'=>2];
test($a, 'a1', 3);

var_dump($a);

<?php


$source = [
    ['id' => 1, 'pid' => 0, 'name' => '动物'],
    ['id' => 2, 'pid' => 1, 'name' => '软体'],
    ['id' => 3, 'pid' => 1, 'name' => '哺乳'],
    ['id' => 4, 'pid' => 0, 'name' => '植物'],
    ['id' => 5, 'pid' => 2, 'name' => '蜗牛'],
    ['id' => 6, 'pid' => 3, 'name' => '奶牛'],
    ['id' => 7, 'pid' => 3, 'name' => '绵羊'],
    ['id' => 8, 'pid' => 4, 'name' => '菊花'],
    ['id' => 9, 'pid' => 4, 'name' => '仙人掌'],
];

function tree($data)
{
    $items = [];

    foreach ($data as $key => $value) {
        $items[$value['id']] = $value;
    }

    $tree = [];
    foreach ($items as $key => $value) {
        if (isset($items[$value['pid']])) {
            $items[$value['pid']]['sub'][] = &$items[$key];
        } else {
            $tree[] = &$items[$key];
        }
    }
    return $tree;
}

var_dump(tree($source));

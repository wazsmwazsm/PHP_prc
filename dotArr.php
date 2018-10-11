<?php

$a = [
    'a' => [
        'conf' => [
            'name' => 'jack',
        ]
    ]
];
dotSet($a, 'a.conf.name', 'mike');
echo dotGet($a, 'a.conf.name');

function dotSet(&$array, $key, $value)
{
    if (is_null($key)) {
        return $array = $value;
    }
    $keys = explode('.', $key);
    while (count($keys) > 1) {
        $key = array_shift($keys);
        if ( ! isset($array[$key]) || ! is_array($array[$key])) {
            $array[$key] = [];
        }
        // 这里是重新创建了一个引用，$array 和 $a 的引用断掉了
        // 变为了 $array[$key] 数据区的引用
        $array = &$array[$key];
    }
    $array[array_shift($keys)] = $value;
    return $array;
}

function dotGet($array, $key, $default = NULL)
{
    if (is_null($key)) {
        return $array;
    }
    if (isset($array[$key])) {
        return $array[$key];
    }
    foreach (explode('.', $key) as $segment) {
        if ( ! is_array($array) || ! array_key_exists($segment, $array)) {
            return $default;
        }
        $array = $array[$segment];
    }
    return $array;
}

function dotHas($array, $key)
{
    if (empty($array) || is_null($key)) {
        return FALSE;
    }
    if (array_key_exists($key, $array)) {
        return TRUE;
    }
    foreach (explode('.', $key) as $segment) {
        if (! is_array($array) || ! array_key_exists($segment, $array)) {
            return FALSE;
        }
        $array = $array[$segment];
    }
    return TRUE;
}


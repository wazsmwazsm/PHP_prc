<?php

$arr = [
    [
        'id' => 34,
        'name' => 'zakk',
    ],
    [
        'id' => 12,
        'name' => 'bob',
    ],
    [
        'id' => 28,
        'name' => 'jeff',
    ],
];

usort($arr, function ($a, $b) {
    return strcmp($a['name'], $b['name']);
});

var_dump($arr);

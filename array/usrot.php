<?php

$arr = [
    [
        'id' => 34,
        'name' => 'jack',
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
    if ($a['id'] == $b['id']) {
        return 0;
    }
    return ($a['id'] < $b['id']) ? -1 : 1;
});

var_dump($arr);

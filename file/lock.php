<?php


$f = fopen(dirname(__FILE__).'/a.txt', 'w');
// 加锁
if (flock($f, LOCK_EX)) {

    fwrite($f, 'aaa', 3);

    // 解锁
    flock($f, LOCK_UN);
}

fclose($f);

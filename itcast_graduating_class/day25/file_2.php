<?php

header('content-type:text/html;charset=utf-8');


$file = './php34.txt';

$mode = 'a'; //w, x
$handle = fopen($file, $mode);


$content = '离离原上草'."\n";
$result = fwrite($handle, $content);
var_dump($result);

fclose($handle);
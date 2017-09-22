<?php

$file = './php34.txt';
$content = date("H:i:s") . "\n";

//file_put_contents 
//file_get_contents 
//这些不能应对打开大文件的情况
//失败返回false，成功返回写入的字节数

//默认状态下是替换写
//$result = file_put_contents($file, $content);
//追加写
//$result = file_put_contents($file, $content,FILE_APPEND);
//var_dump($result);


$file = './php34.txt';

$mode = 'r';
$handle = fopen($file, $mode);

//var_dump($handle);


//按字节读取
// $len = 6;
// $content = fread($handle, $len);
// var_dump($content);

// //读一次后会移动文件指针
// $len = 6;
// $content = fread($handle, $len);
// var_dump($content);

//fgets读的长度为 len - 1
//读到行末结束(\n)
//最常用：以行来读
$len = 24;
$content = fgets($handle, $len);
var_dump($content);

//一次只读一个字节
echo fgetc($handle);
echo fgetc($handle);
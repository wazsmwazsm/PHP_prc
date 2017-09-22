<?php

header('content-type:text/html;charset=utf-8');


$file = './php34.txt';

// $mode = 'r'; //w, x
// $handle = fopen($file, $mode);

// //显示当前文件指针位置
// echo '<br>'.ftell($handle);
// //设置当前文件指针位置
// fseek($handle, 3);

// echo '<br>'.ftell($handle);

// echo '<br>'.fread($handle, 6);

// $file = './php34.txt';

// r+最常用：可以任意操控指针，还不会清空数据
// //r+模式下的写入会覆盖掉原有的字符串，替换写
// $mode = 'r+'; //w, x
// $handle = fopen($file, $mode);
// echo '<br>'.fgets($handle, 4);
// echo '<br>'.ftell($handle);
// var_dump(fwrite($handle, 'Cool!'));

$file = './php34.txt';

$mode = 'a'; //w, x
$handle = fopen($file, $mode);
//虽然追加，但是文件指针还是0,
//这两个类型指针位置有不确定因素
// echo '<br>'.ftell($handle);
// fseek($handle, 5);
// echo '<br>'.ftell($handle);
// //读取受指针控制
// echo '<br>'.fgets($handle, 4);
// //写入不受指针控制
// var_dump(fwrite($handle, 'Cool!'));

//返回文件最后修改时间
echo date('<br>修改时间： Y-m-d H:i:s',fileatime($file));

//返回文件大小
echo '<br>文件大小'.filesize($file).'B';

fclose($handle);
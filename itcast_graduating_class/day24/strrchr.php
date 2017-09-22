<?php

$file = 'x.y.z.png';
//找到字符串中某个子字符的最后出现位置，从该位置截取到字符串末尾
echo strrchr($file, '.');

echo "<br>";

//找到字符串中某个子字符的首次出现位置，从该位置截取到字符串末尾
echo strchr($file, '.');

echo "<br>";

$file =  __FILE__;

//把文件路径拆开为dirname、basename、extension、filename这几部分
$info = pathinfo($file);

var_dump($info);

echo "<br>";

//生成一个唯一的名字时常用
//string uniqid  ([ string $prefix  = ""  [, bool $more_entropy  = false  ]] )
//获取一个带前缀、基于当前时间微秒数的唯一ID。 
echo uniqid(),"<br>";

//添加前缀
echo uniqid("logo_"),"<br>";

//后面多小数，增强唯一性
echo uniqid("logo_",true),"<br>";



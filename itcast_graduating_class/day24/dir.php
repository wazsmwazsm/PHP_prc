<?php

/*
$path = './dir/some/';
$result = mkdir($path,0755,true);

var_dump($result);

//只能删除空目录
//$result = rmdir($path);

//var_dump($result);


$path_from = './dir/some';
$path_to = './dir/where';

//改名、移动,也能操作文件
rename($path_from, $path_to);

*/


//浏览目录

$path = './';

$dir_handle = opendir($path);

//返回文件名，一次读一个像下移动文件指针,没有返回false
//防止文件名为0的文件，进行字符串'0'转换为false，用全等判断
while(($result = readdir($dir_handle)) !== false){
	if($result == '.' || $result == '..') continue;
	echo $result."<br>";
}

closedir($dir_handle);


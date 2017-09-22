<?php

echo date("Y-m-d H:i:s",time());


$abc = 10;
$def = "abc";
//想要让双引号识别可变变量，那么需要加上大括号
echo "${$def}";
echo get_include_path();
echo "<br>".PATH_SEPARATOR;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
//常量定义1
define("PI",3.14);
define("CC","as");

echo PI.'<br>'.CC.'<br>';
//常量定义2
const C1 = 11;

echo C1.'<br>';
echo constant("C1");
//constant灵活
//比如一个循环中:constant("C".$i)可输出C1、C2等常量
//关闭错误显示,但是不能屏蔽掉log日志输出
//ini_set("display_errors",0);
if(defined("ASD"))
	echo ASD;
else
	echo "常量不存在";
?>
</body>
</html>
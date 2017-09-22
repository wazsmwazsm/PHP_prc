<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>网页标题</title>
	<meta name="keywords" content="关键字列表" />
	<meta name="description" content="网页描述" />
	<link rel="stylesheet" type="text/css" href="" />
	<style type="text/css"></style>
	<script type="text/javascript"></script>
</head>
<body>
<?php
//设定配置文件中的include_path的值——代码中的设定只对当前代码有效。
//而且这里的设定，无需重启apache
set_include_path('C:/itcast/class/bj-php-34/day2');

//更常见的做法：
$path = get_include_path();	//先获取系统的include_path值
$path_new = $path . PATH_SEPARATOR ."C:/itcast/class/bj-php-34/day2";
//PATH_SEPARATOR: 是系统常量，代表目录分割符：
//		unix系列中，是“:”
//		window系列中，是“;”
set_include_path($path_new);	//再来设定“自己”想要加入的paht路径
								//这样就不会破坏（丢失）原有路径设定

echo "<p>当前工作目录：" . getcwd() .'</p>';	//getcwd()获得当前工作目录

//相对路径：
include './dir1/page1.php';
//使用一个无路径设定的载入文件：
include '4get_1.php';	//这个实际是day2中的一个文件
?>
</body>
</html>

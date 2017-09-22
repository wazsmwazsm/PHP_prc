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
ini_set('display_errors', true);
//除了notice显示所有错误
//开发中一般启用全部即：E_ALL | E_STRICT
ini_set("error_reporting",E_ALL&~E_NOTICE| E_STRICT);
echo "当前时区".date_default_timezone_get().'<br>';
//str_pad用指定字符扩展字符串到指定长度
echo str_pad(decbin(ini_get("error_reporting")),32,"0",STR_PAD_LEFT);
echo "<h3>3中常见的系统错误</h3>";
echo $var1;				//使用不存在的变量
echo "正确代码1";
include 'no-file.php';	//包含不存在的文件
echo "<br />正确代码2";
$m = func1();			//调用不存在的函数
echo "<br />正确代码3";



?>
</body>
</html>

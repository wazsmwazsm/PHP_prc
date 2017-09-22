<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

//从文件内容得到字符串
$s1 = file_get_contents('./a1.txt');
$s2 = file_get_contents('./a2.txt');
$s3 = file_get_contents('./a3.txt');

//反序列化
$var1 = unserialize($s1);
$var2 = unserialize($s2);
$var3 = unserialize($s3);

echo "<pre>";
var_dump($var1,$var2,$var3);
echo "</pre>";





?>
</body>
</html>
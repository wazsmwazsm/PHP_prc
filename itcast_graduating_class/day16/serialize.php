<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php


$v1 = 1;
$v2 = 'abc';
$v3 = array('a' => 1, 'bb' => 2.2, 'abcddsad', true);

//序列化
$str1 = serialize($v1);
$str2 = serialize($v2);
$str3 = serialize($v3);

//输出到文件内容
file_put_contents('./a1.txt',$str1);
file_put_contents('./a2.txt',$str2);
file_put_contents('./a3.txt',$str3);










?>
</body>
</html>
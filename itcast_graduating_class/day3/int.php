<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

//字符串数字也可以，因为PHP会自动提取字符串中的数字，如果纯字母则为0计算
$v2 = 123;
$v1 = '123';

$r1 = decbin($v1);
echo $r1.'<br>';
echo decbin($v2);
echo getType($r1);

//最好引号括起来,如果里面有0和1之外的东西则忽略
$b1 = '11000101';
echo bindec($b1);
?>
</body>
</html>
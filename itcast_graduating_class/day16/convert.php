<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

//数组转对象，非字符下标的属性就无法取得类
//小细节: 转换为对象后类名为stdclss
$arr = array('a1'=>1, 'bb'=>2.2, 3, 4.5);

$o1 = (object)$arr;

var_dump($o1);
echo "<hr />";
echo "属性a1：".$o1->a1;
echo "属性bb：".$o1->bb;

echo "<hr />";

$v1 = null;
$o2 = (object)$v1;
var_dump($o2);
echo "<hr />";

$s1 = 1;
$s2 = 2.2;
$s3 = 'abc';
$s4 = true;

//普通数据转为对象后属性名都为scalar(标量)
$obj1 = (object)$s1;
$obj2 = (object)$s2;
$obj3 = (object)$s3;
$obj4 = (object)$s4;


echo "<pre>";
var_dump($obj1,$obj2,$obj3,$obj4);
echo "</pre>";
?>
</body>
</html>
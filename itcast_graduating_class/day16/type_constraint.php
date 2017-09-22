<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

//数组约束
function f2(array $a){
	$c = count($a);	
	return $c;
}

$r1 = f2(array(1,2,5,4));

echo "<br />长度为：".$r1;


class A{}
//类型限制，传参只能是A的实例（对象）
function f1(A $p1)
{
	echo "<br />";
	var_dump($p1);
}

//f1(3);
//f1('abd');
$o1 = new A();
f1($o1);





?>
</body>
</html>
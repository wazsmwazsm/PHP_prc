<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

class A{
	public $p1 = 1;
	public $p2 = 2;	
	
	//将对象当函数用时自动调用的方法
	function __invoke()
	{
		echo "对象不该当作函数使用哦";
		
	}
}

$o1 = new A();

$o1();








?>
</body>
</html>
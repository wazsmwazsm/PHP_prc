<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

//实现一个单例类
class B{
	public $v1 = 10;
	
	private static $instance;
	
	
	private function __construct(){}
	//PHP可以通过clone来克隆对象，所以要私有化，别的语言不存在这个问题
	private function __clone(){}
	
	public static function getNew()
	{
		if(!isset(B::$instance))
		{
			B::$instance = new self;
		}
		return B::$instance;	
	}
}

$o1 = B::getNew();

$o1->v1 = 100;

$o2 = B::getNew();

var_dump($o1,$o2);

echo "<br />o1中的v1： ".$o1->v1;

echo "<br />o2中的v1： ".$o1->v1;




?>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
</body>
<?php

class C{
	public $p1 = 1;
	function showMe()
	{
		echo "我是父类，我的数据有:";
		echo "<br />C中p1 = ".$this->p1;
	}
	
	function __construct($p1)
	{
		$this->p1 = $p1;
	}
}

class D extends C{
	public $p2 = 2;
	function showMe2()
	{
		echo "我是子类，我的数据有:";
		//调用父类的方法
		parent::showMe();
		echo "<br />D中p2 = ".$this->p2;
	}	
	
	function __construct($p1,$p2)
	{
		//经典用法
		//调用父类的构造函数来进行初始化
		//节省代码量
		parent::__construct($p1);
		$this->p2 = $p2;
	}
}


$d1 = new D(40,30);

$d1->showMe2();


?>
</html>
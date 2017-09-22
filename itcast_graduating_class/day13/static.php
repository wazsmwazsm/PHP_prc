<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
class C1{
	static $v1 = 10;	
	public $v2 = 20;
	//这里的public可以省略
	static public function showInfo()
	{
		echo "显示信息";	
		//也可以用self::$v1
		echo "v1 = ".C1::$v1."<br />";
		// 注意，静态方法中不能使用this哦！因为直接用类来调用它无法找出this是哪个对象
		//echo "v2 = ".$this->v2;
		
	}
	function f1()
	{
		echo "这是一个非静态方法";	
		
	}
	
}
// 修改静态属性
// ::双冒号语法也叫范围解释符
C1::$v1 = 100;

$s1 = C1::$v1;


echo "s1 = ".$s1."<br />";

$c1 = new C1();

//不推荐这么使用
echo "对象调用静态属性：s1 = ".$c1::$v1."<br />";

echo "调用静态方法：<br />";
C1::showInfo();


class S2{
	static function getInstance()
	{
		return new self;		
	}
	public function show()
	{
		echo "Hi!<br />";		
	}
}

$s1 = S2::getInstance();

$s1->show();

?>
</body>
</html>
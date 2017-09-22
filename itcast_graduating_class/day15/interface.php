<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
//接口：用来统一操作,接口和抽象类最大不同就是可以多个实现
//接口中有 接口常量 接口方法
//和抽象类相比，抽象类可以有属性和普通方法，接口没有
//接口算是对单继承的一种补充，一种实现业务逻辑的方便的手段

interface flyAnimal {
	//接口中的方法都是抽象方法但是不用abstract声明
	function fly();	
}

interface smallAnimal {
	//接口中的方法都是抽象方法但是不用abstract声明
	function small();	
}

class bird{
	public $wings = '2';
	
}

//继承接口的特性被称为实现，必须要实现接口中的方法或者声明为抽象方法
class maque extends bird implements flyAnimal, smallAnimal{
	function fly()
	{
		echo "麻雀可以飞";	
		echo ",麻雀有{$this->wings}个翅膀.";
	}
	function small()
	{
		echo "麻雀很小。";	
		
	}
}

$m1 = new maque();

$m1->fly();
$m1->small();

class tuoniao extends bird{
	function run()
	{
		echo "<br />鸵鸟可以跑";
		
	}
}

$t1 = new tuoniao();
$t1->run();

?>
</body>
</html>
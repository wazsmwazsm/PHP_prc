<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php


class A{
	public $a1 = 1;		
	public $b1;
	function __construct(){
		//b1中存储的是对象，浅克隆后对象标识符没变
		$this->b1 = new B();	
	}
	//使用魔术方法__clone
	//此方法会正在克隆的时候自动调用
	//tips：只要写了这个魔术方法，就不存在嵌套克隆问题，内部机制处理了
	function __clone(){
		//因为b1是对象或资源类型，无法被克隆，所以进行额外的克隆
		$this->b1 = clone $this->b1;
	}
}

class B{
	public $b2 = 2;	
	
	
}

//克隆相当于变量的传值类型赋值，因为对象直接赋值会赋值对象标识符，还是一个对象
//克隆后就相当于完全复制类一个对象，克隆后的对象是新的，对象标识符不同
//浅克隆，不能克隆对象类型和资源类型的属性
$o1 = new A();
$o2 = clone $o1;
$o1->a1 = 10;
//赋值后发现全变了
$o1->b1->b2 = 10;
echo "<pre>";
var_dump($o1,$o2);
echo "</pre>";




?>
</body>
</html>
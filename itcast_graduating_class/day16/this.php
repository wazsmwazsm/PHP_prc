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
	function f1(){
		echo "当前对象的类".get_class($this);	
		echo "<br />p1的值为".$this->p1;
		//静态调用另一个类中的方法f2时，f2会自动获得f1中的this对象
		@ B::f2(); // 对象向下传递特性
	}
}
class B{
	function f2(){
		echo "当前对象的类".get_class($this);	
		echo "<br />p1的值为".$this->p1;
	}
}
$o1 = new A();
$o1->f1();








?>
</body>
</html>
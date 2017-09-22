<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
class C1{
	// var和public等同
	var $name = '匿名';	
	var $age = 19;
	var $sex = '未知';
	function f1()
	{
		//this代表此对象，实例化后被确定
		//self代表本类，和对象无关
		echo "函数f1被调用<br />".$this->name.$this->sex.$this->age;
		//使用常量
		echo "<br />".self::PI;	
	}
/*	类常量属于类自身，不属于对象实例，不能通过对象实例访问
 * 不能用public，protected，private，static修饰
 * 子类可以重写父类中的常量，可以通过（parent::)来调用父类中的常量
 * 自PHP5.3.0起，可以用一个变量来动态调用类。但该变量的值不能为关键字（如self，parent或static）。*/
	const PI = 3.14;
	//注意类中只有属性方法和常量，不能写其他代码，逻辑代码写在方法中
}

$qin = new C1();

$qin->name = '秦琼';
$qin->sex = '男';
$qin->age = 24;

$qin->f1();

//这样不可以，类常量不属于对象，不能被对象调用
echo $qin->PI;



//可变类
$CName = "C1";
$a = new $CName();

$a->f1();

class Person {
	public $name = "匿名";
	public $age = 18;
	public $PI = 3.14;
	function intro()
	{
		echo "Hello, my name is".$this->name;
		
		echo " I am ".$this->age." years old.";	
	}
	function getXiebian($a, $b)	
	{
		$s1 = $a*$a + $b*$b;
		$s2 = pow($s1, 0.5);
		return $s2;
	}
}

$p1 = new Person();
$xiebian = $p1->getXiebian(3,4);

echo "<br />斜边等于：".$xiebian;

$p1->name = '秦琼';
$p1->age = 24;
$p1->intro();
?>



</body>
</html>
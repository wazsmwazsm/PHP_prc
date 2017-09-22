<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
function f1()
{
	echo "f1函数被执行，任务完成";	
}

function f2($x,$y){
	echo "f2函数被执行，任务完成";	
	return $x+$y;
}

class A{
	
	public $p1 = 1;
	//这里声明为private更好
	private $propArr = array();//一个数组，用来存储不存在的值
	
	
	//实现了属性的扩展，JS天生有这个功能
	//但是不能全这么做，可读性不好不符合规范,太随意
	function __get($prop_name)
	{
		//如果存在了这个属性就直接返回，不重复设置
		if(isset($this->propArr[$prop_name]))
		{
			return $this->propArr[$prop_name];	
		}
		return "不存在属性$prop_name";
	}
	
	function __set($prop_name,$value)
	{
		
		$this->propArr[$prop_name] = $value;
	}
	//全是魔术方法，会在特殊情形自动调用
	function __isset($prop_name)
	{
		if(isset($this->propArr[$prop_name]))
		{
			return true;	
		}
		return false;
	}
	function __unset($prop_name)
	{
		
		unset($this->propArr[$prop_name]);
	}
	//调用一个不存在的方法是就调用此方法
	// $name就是本来要调用的方法名
	// $array就是调用函数的实参
	function __call($name,$array)
	{
		if($name == 'f1')
		{
			f1();	
		}
		else if($name == 'f2')
		{
			return f2($array[0],$array[1]);	
		}
		
	}
}

$o1 = new A();

echo "<br />o1的属性p1值为：".$o1->p1;
echo "<br />o1的属性p2值为：".$o1->p2;

$o1->p2 = 2;

echo "<br />o1的属性p1值为：".$o1->p1;
echo "<br />o1的属性p2值为：".$o1->p2;

$o1->p3 = 6;

echo "<br />o1的属性p3值为：".$o1->p3;
echo "<hr />";
$s1 = isset($o1->p4);
var_dump($s1);
echo "<hr />";
$s2 = isset($o1->p3);
var_dump($s2);
echo "<hr />";


// 调用没定义的方法
$o1->f1();
$v1 = $o1->f2(5,7);

echo "<br />结果v1= ".$v1;


//__get和__set对静态变量是无法操作的
A::$r1 = 1;
echo A::$r1;
?>
</body>
</html>
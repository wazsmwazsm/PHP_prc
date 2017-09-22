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
		//根据参数的不同调用不同的函数，实现了其他语言的重载
		$count = count($array);
		if($count == 0)
		{
			f1();	
		}
		else if($count == 2)
		{
			return f2($array[0],$array[1]);	
		}
		
	}
}
$o1 = new A();

// 调用没定义的方法
$o1->f1();
$v1 = $o1->f1(5,7);

echo "<br />结果v1= ".$v1;

?>
</body>
</html>
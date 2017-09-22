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
	protected $a2 = 2;
	private $a3 = 3;	
	//想要全部遍历要自己写方法
	function fetchAllProp(){
		foreach($this as $key => $value){
			echo "<br />属性：$key = $value";	
		}	
	}
	//想要遍历部分数据
	function fetchSomeProp($arr){
		foreach($this as $key => $value){
			//如果有属性在传过来的数组，就显示
			if(in_array($key,$arr)){
				echo "<br />属性：$key = $value";	
			}
		}	
	}
}

$o1 = new A();

//遍历对象只能访问权限内可访问的属性
foreach($o1 as $key => $value){
	echo "<br />属性：$key = $value";	
}

echo "<hr />";
$o1->fetchAllProp();

echo "<hr />";
$o1->fetchSomeProp(array('a1','a3'));





?>
</body>
</html>
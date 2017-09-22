<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

class A{
	function f1(){
		
		echo "<br />".__CLASS__;
		echo "<br />".__METHOD__;
		//get_class()可以得到类名，但是需要有一个对象
		echo "<br />当前类为：".get_class($this);	
		
	}
}
$o1 = new A();
$o1->f1();











?>
</body>
</html>
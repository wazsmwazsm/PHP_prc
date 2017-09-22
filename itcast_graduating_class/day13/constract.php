<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

class Person {
	public $name = "匿名";
	public $age = 18;
	public $PI = 3.14;
	function intro()
	{
		echo "Hello, my name is".$this->name;
		
		echo " I am ".$this->age." years old.";	
	}
	function __construct($n, $a)
	{
		$this->name = $n;
		$this->age = $a;
	}
	
	function __destruct()
	{
		echo "<br />被销毁了";
	}
}

$p1 = new Person('方勇',25);

$p1->intro();

?>
</body>
</html>
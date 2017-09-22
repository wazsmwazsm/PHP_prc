<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
class A{
	static $p1 = 1;
	static function showInfo(){	
		//self永远代表其所在代码的类
		//echo "<br />".self::$p1;
		//作静态绑定
		//static可以代替self，代表的是当前'调用本方法的类'
		echo "<br />".static::$p1;		
	}
}

class B extends A{
	static $p1 = 10; //进行了覆盖	
}

//这里就算一种多态的表现，不同对象调用相同方法得出不同结果
A::showInfo();
//还是1,如果想要输出自己的p1则需要静态绑定
B::showInfo();

?>
</body>
</html>
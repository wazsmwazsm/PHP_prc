<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

class JZ{
	public $p1 = '具有脊椎';
	function showMe()
	{
		echo "我是脊椎动物，特征为:";
		echo "<br />属性p1 = ".$this->p1;
	}
}

class Human extends JZ{
	//重写了属性p1
	public $p1 = '具有28节脊椎';
	public $p2 = '具有32节颗牙齿';
	//这里重写了方法
	//重写要求权限不低于上级的访问权限
	//而且注意重写的话参数也要求一样，和其他语言不同，不能重载
	function showMe()
	{
		echo "我是人类，特征为:";
		//调用父类的方法
		//注意，调用父类方法时父类方法中的this是指向当前对象的
		//因为this总代表当前操作对象
		parent::showMe();
		echo "<br />属性p1 = ".$this->p1;
		echo "<br />属性p2 = ".$this->p2;
	}	

}


$h1 = new Human();

$h1->showMe();


?>
</body>
</html>
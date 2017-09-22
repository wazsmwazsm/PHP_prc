<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

//一个脚本中之只能有一个自动加载函数
//在需要类的时候：静态方法调用，创造新类 时自动调用
function __autoload($className){
	
		require "./library/".$className.".class.php";  
}

//使用注册__autoload就无效了
//可以注册多个用于自动加载的函数
//当用到类时会依次调用注册的函数

spl_autoload_register('auto1');

spl_autoload_register('auto2');

function auto1($className)
{
	$file =  "./library/".$className.".class.php";
	//要进行存在与否的判断
	if(file_exists($file)){
		require $file;	
	}
	
}
function auto2($className)
{
	$file =  "./class/".$className.".class.php";
	if(file_exists($file)){
		require $file;	
	}
}



$o1 = new A();

echo "o1中的a为：".$o1->a;






?>
</body>
</html>
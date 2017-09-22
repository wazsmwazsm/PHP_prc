<?php

//一个简单的工厂类
class factory{
	static function getInstance($className)
	{
		//判断一下有没有包含这个类的文件
		if(file_exists('./class/'.$className.".class.php"))
		{
			$obj = new $className();
			return $obj;
		}
		else
		{
			return null;	
		}
	}
}


$obj1 = factory::getInstance("A"); //获取类A的一个对象







?>

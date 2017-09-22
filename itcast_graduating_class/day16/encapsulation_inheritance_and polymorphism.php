<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

class A{
	//一个斜杠是私有的习惯写法
	private $_age = 0;	
	//严格意义上的封装，尽量做成私有，并通过共有的方法来向外提供
	//对该属性的可控操作
	function setAge($age){
		if($age >= 0 && $age <= 127){
			$this->_age = $age;
		}
		else{
			trigger_error("年龄超出范围！",E_USER_ERROR);	
		}
	}
	function getAge(){
			
		return $this->_age;
	}
}

$o1 = new A();
$o1->setAge(18);

echo "年龄为".$o1->getAge();




?>
</body>
</html>
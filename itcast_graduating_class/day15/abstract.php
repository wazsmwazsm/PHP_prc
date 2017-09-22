<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
abstract class guai{
	
	public $blood = 100;
	protected $distance = 30;
	//抽象方法是规范，就是为了重写
	protected abstract function attack();
	
	
}

class snakeGuai extends guai{
	function attack()
	{
		echo "<br />吐火攻击";	
		$this->blood--;
	}

}

$o1 = new snakeGuai();

$o1->attack();

echo "<br />该蛇怪剩余血量为：".$o1->blood;








?>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
/*
设计如下几个类：
商品类，有名称，有价钱，库存数，可显示自身信息（名称，价钱）。
手机类，是商品的一种，并且有品牌，有产地，可显示自身信息。
图书类，是商品的一种，有作者，有出版社， 可显示自身信息。
创建一个手机对象，并显示其自身信息；
创建一个图书对象，并显示其自身信息；

*/


abstract class shangPin{
	public $name;
	public $price;
	public $store;
	
	function __construct($name,$price,$store){
		$this->name = $name;
		$this->price = $price;
		$this->store = $store;
	}
	function showInfo(){
		echo "<br />商品名称：$this->name";
		echo "<br />商品价格：$this->price";
		echo "<br />商品库存：$this->store";	
	}
}

class Moblie extends shangPin{
	public $brand;
	public $chandi;
	function __construct($name,$price,$store,$brand,$chandi)
	{
		parent::__construct($name,$price,$store);
		$this->brand = $brand;
		$this->chandi = $chandi;
	}
	function showInfo(){
		parent::showInfo();
		echo "<br />商品品牌：$this->brand";
		echo "<br />商品产地：$this->chandi";			
	}
}


$mobile1 = new Moblie('Iphone SE',3200,22,'Apple','深圳');

$mobile1->showInfo();
?>
</body>
</html>
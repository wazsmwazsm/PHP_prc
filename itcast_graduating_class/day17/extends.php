<?php
header('Content-Type: text/html; charset=utf-8');
// 父类，基础类，
class Goods {
	public static $static_p = '静态属性';
	protected $_name;
	protected $_price = 'Goods';

	public function setName($name) {
		$this->_name = $name;
	}
}

class Book  extends Goods {
	// protected $_price = 'Book';
	protected $_author;
	protected $_publisher;

	// public function setName($name) {
	// 	$this->name = '《' . $name . '》';
	// }

}
class Phone extends Goods {
	protected $_brand;
	protected $_color;	
}

// $b = new Book();

// $b->setName('神雕侠侣');

// var_dump($b);


echo Book::$static_p;
echo '<br>';
echo Phone::$static_p;
echo '<hr>';
//静态属性存在于父类，子类只是对其进行了连接，子类改变其值是改变的父类的初始值
Book::$static_p = '静态属性 in Book';
echo Book::$static_p;
echo '<br>';
echo Phone::$static_p;
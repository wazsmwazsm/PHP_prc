<?php

abstract class Goods implements I_Goods {
	protected $_name;
	protected $_price;
	// 任何类型的商品，都应该存在设置name属性的方法，
	// 不过不同类型，实现的方式可以不同
	abstract public function setName($name);

	//任何商品的处理价格的操作，必须要统一，不能被每种商品自己决定。
	final public function setPrice($price) {

	}
	final public function getPrice() {

	}
}
//任何一种商品，仅仅是Goods子类的对象，不能在无限度的扩张
final class Book  extends Goods {
	protected $_author;
	protected $_publisher;
	public function setName($name) {
		$this->_name = '《' . $name . '》';
	}

}
class Phone extends Goods {
	protected $_brand;
	protected $_color;	
	public function setName($name) {
		$this->_name = $name; 
	}
}
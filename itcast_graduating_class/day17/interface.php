<?php
	//惯用开头写法,规范写法
	//没有实现接口，类照样很好的运行，但有了接口一方面是好给别人看
	//类有什么怎么实现的，另一方面就是能限制类的设计
	interface I_Goods {
		//接口中的抽象方法必须是public，抽象类没有限制
		public function setName($name);
		public function setPrice($price);
		public function getPrice($price);
	}


	abstract class Goods implements I_Goods {
		//必须实现接口的说明
		public function setName($name){}
		final public function setPrice($price){}
		final public function getPrice($price){}

	}










?>
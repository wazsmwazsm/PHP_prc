<?php

	header('Content-type:text/html;charset=utf-8');

	class H {
		
	}

	class Z extends H {
		private $p = '属性值';
		public function ZgetP(){
			echo $this->p;
		}
	}

	class K extends Z {
		public function KgetP(){
			echo $this->p;
		}
	}


	$o = new K();
	//访问到的居然是Z类的p属性
	$o->ZgetP();
	//dump后发现p属性被继承了
	//私有属性可以被继承，但是不能被继承的类访问
	var_dump($o);
	//这样就访问不到了，因为这里是用自己的方法，而调用父类
	//方法时是去寻找到父类Z的代码中执行方法，在Z中p属性是
	//可以访问的，而调用自己方法时是在K的代码区域中，K是无权
	//访问Z中的私有属性的
	//所以想要访问继承下来的父类的私有方法，可以调用父类的共有方法的方式来取得
	$o->KgetP();
	

?>
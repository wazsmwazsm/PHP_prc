<?php

	header('Content-type:text/html;charset=utf-8');

	class H {
		public function HgetP(){
			echo $this->p;
		}
		public static function HgetStatic(){
			echo self::$sp;
		}
	}

	class Z extends H {
		protected $p = '属性值';
		protected static $sp = '静态属性';
		public function ZgetP(){
			echo $this->p;
		}
		public static function ZgetStatic(){
			echo self::$sp;
		}
	}

	class K extends Z {
		public function KgetP(){
			echo $this->p;
		}
		public static function KgetStatic(){
			echo self::$sp;
		}
	}


	$o = new K();
	//protected限定的变量是可以被继承的类所调用的
	$o->HgetP();
	
	var_dump($o);
	
	echo "<br />";

  
	//测试静态变量的访问

	//H是访问不了的
	//类能不能访问到成员根据this，要对象中有没有这个数据能不能访问
	//而类直接访问受限于源代码，类中没有的又没有继承关系去取得的就
	//访问不到了，父类无法访问子类的独有属性
	//H::HgetStatic();
	Z::ZgetStatic();
	K::KgetStatic();


?>
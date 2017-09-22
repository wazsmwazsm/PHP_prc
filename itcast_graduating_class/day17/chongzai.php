<?php

header('Content-Type: text/html; charset=utf-8');
class Student {
	private $_name;
	private $_sn;
	private $_gender;
	private $_age;

	public function __set($p, $v) {
		//判断属性是佛以_开头，不是，则增加。
		if (substr($p, 0, 1) != '_') {
			$p = '_' . $p;
		}
		//设置批量管理可操作的属性
		//实际开发可能使用到
		$allow_set_list = array('_name', '_gender', '_age');
		if (in_array($p, $allow_set_list)) {
			$this->$p = $v;//可变标志符，可变属性
		}
	}

	// public function __set($p, $v) {
	// 	$allow_set_list = array('_name', '_gender', '_age');
	// 	if (in_array($p, $allow_set_list)) {
	// 		$this->$p = $v;//可变标志符，可变属性
	// 	}
	// }

	// public function __set($p, $v) {

	// }

	// public function __set($p, $v) {
	// 	// 不可访问
	//  如果不是内部存在的变量则不允许新增
	// 	if (property_exists($this, $p)) {
	// 		//存在
	// 		trigger_error('属性不允许操作', E_USER_ERROR);
	// 	} else {
	// 		// 不存在
	// 	}
	// }

	private $_t;//当前学生的班主任
	public function setT($t) {
		$this->_t = $t;
	}
	public function __call($m, $args) {
		//echo '呵呵，方法' . $m . '不存在，请查证后再拨,请试试xxx';

		//问问班主任是否可以解决该问题（方法存在可以解决）
		if (method_exists($this->_t, $m)) {
			return $this->_t->$m();//可变标志符，可变方法名
		} else {
			echo 'Hehe！';
		}
	}
}

class Teacher {
	public function getStudentNumber() {
		return 67;
	}
}
$t = new Teacher;
$o = new Student;
$o->sett($t);

echo $o->getStudentNumber();


// $o->_name = '杨过';//操作一个受限的属性，是一个重载操作。
// $o->nickname = '神雕大侠';// 操作不存在的属性，是一个重载操作。
// var_dump($o);
// echo '<br>';
// $o->_name = '杨过';
// var_dump($o);

// $o->name = '杨过';
// var_dump($o);
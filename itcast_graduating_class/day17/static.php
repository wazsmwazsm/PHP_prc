<?php
 
header('Content-type:text/html;charset=utf-8');

class Student{

	//学生计数器
	private static $_student_count = 0;

	private $_name;

	public function __construct($name){
		$this->_name = $name;
		//也可以用self
		++ static::$_student_count;
	}

	public function __clone(){
		++ static::$_student_count;
	}

	public function __destruct(){
		-- static::$_student_count;
	}

	public static function getCount(){
		return static::$_student_count;
	}

}

$s1 = new Student('杨过');
echo '当前已经存在'.Student::getCount().'名学生<br />';

$s2 = new Student('小龙女');
echo '当前已经存在'.Student::getCount().'名学生<br />';

$s3 = new Student('李莫愁');
echo '当前已经存在'.Student::getCount().'名学生<br />';

unset($s3);
echo '当前已经存在'.Student::getCount().'名学生<br />';

 
?>










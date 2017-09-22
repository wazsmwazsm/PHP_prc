<?php

header('Content-Type: text/html; charset=utf-8');

class Student {
	
	public static function getStudentCount() {
		var_dump($this); 
		return 42;
	} 

	public function getName() {
		var_dump($this); 
		return '神雕侠侣'; 
	}
}

echo Student::getStudentCount();
echo '<br>';
echo Student::getName();
echo '<br>';
echo '<hr>';
$s = new Student;
echo $s->getName();
echo '<br>';
//对象也可以调用静态方法，但是不推荐，而且静态方法里不能有this
echo $s->getStudentCount();
echo '<br>';
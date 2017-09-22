<?php

class Student{

	//声明常量
	const GENDER_MALE = 1;
	const GENDER_FEMALE = 2;
	const GENDER_SECRET = 3;

	//声明属性
	private $_gender;
	private $_name;
	private $_age;

	//声明方法
	public function __construct($name,$gender=3,$age=0){
		$this->_name = $name;
		$this->_gender = $gender;
		$this->_age = $age;
	}

	public function setGender($gender){
		if(in_array($gender,array(self::GENDER_MALE,self::GENDER_FEMALE,self::GENDER_SECRET))){
		$this->_gender = $gender;			
		} else {
			trigger_error('设置的性别不正确',E_USER_WARNING);
		}
	} 
 
}

//实例化对象
$s1 = new Student('杨过',Student::GENDER_MALE,24);

$s2 = new Student('小龙女',Student::GENDER_FEMALE,27);

header('Content-type:text/html;charset=utf-8');
echo "<pre>";
var_dump($s1,$s2);
echo "</pre>";



?>







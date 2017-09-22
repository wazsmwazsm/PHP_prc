<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

class Student {
	public $name;
	public $sex;
	public $age;
	
	static $studentNum = 0;
	
	const SCHOOL = '科大<br /><br />';
	
	function __construct($n,$s,$a)
	{
		$this->name = $n;
		$this->sex = $s;
		$this->age = $a;
		self::$studentNum += 1;
		echo $this->name."已加入传智，当前有".self::$studentNum."个学生<br />";
	}
	function __destruct()
	{
		echo '<br />'.$this->name.'已注销<br />';	
	}
	
	public function intro()
	{
		// 这里是普通方法所以也可以用$this::SCHOOL代替self::SCHOOL
		echo "<br />学生姓名：".$this->name."<br />学生性别："
		.$this->sex."<br />学生年龄：".$this->age."<br />所属学校：".self::SCHOOL;		
	}
}

$stu1 = new Student('秦琼','男',24);
$stu1->intro();

$stu2 = new Student('韩梅梅','女',18);
$stu2->intro();

$stu3 = new Student('李雷','男',19);
$stu3->intro();


?>
</body>
</html>
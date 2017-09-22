<?php
// echo 'before session start';
//设置600s的sessionID有效期，有效域为kang.com
//一定要在session_start开始前设置
//session做的设置针对所有session数据有效，和cookie不同
//通常session属性设置不推荐修改，一般选用默认值
//想要一个数据可以长时间保持，那么选用cookie会更好一些
//session_set_cookie_params(600, '/', 'kang.com');

//载入自己的session存储设置
require './userSession.php';
//start函数前面不能有输出  
session_start();


$_SESSION['class_name'] = 'PHP34';
$_SESSION['teacher_name'] = 'Kang';

unset($_SESSION['teacher_name']);

$_SESSION['class_name'] = 'ITCAST-PHP34';

var_dump($_SESSION['class_name']);

//session数据存储灵活，可以存储任意数据，比cookie灵活
//存储时自动的序列化后才进行类存储，当然资源类型无法序列化
//注意，session变量名只能是字符串,会自动忽略数值形的键值
$_SESSION['student_list'] = 
array(
	array('name' =>'qin', 'gender'=>'male','hobby'=>array('足球','篮球','羽毛球')),
	array('name' =>'Kun', 'gender'=>'male','hobby'=>array('橄榄球','篮球','棒球')),
	);


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

$config = array(
	'host'=>'localhost',
	'port'=>'3306',
	'username'=>'root',
	'password'=>'wzdanzsm',
	'charset'=>'utf8',
	'dbname'=>'my_test',
);

function __autoload($className){
	require './'.$className.'.class.php';	
}

$my = mysqlDB::getInstance($config);

$str = serialize($my);

file_put_contents('./mysqldb.txt',$str);




?>
</body>
</html>
<?php
header('Content-type:text/html;charset=utf-8');
//data source name
//'mysql: 数据源前缀，说明是何种数据库服务器
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=my_test';

$username = 'root';

$password ='wzdanzsm';

// driver_options 对于当前数据服务器的一些初始化选项
$driver_options  = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', 
	);
//PDO: PHP Data Object
$pdo = new pdo($dsn,$username,$password,$driver_options);

/* 错误信息
$sql = "show  database;";

if(!$result =  $pdo->query($sql)){

	var_dump($pdo->errorInfo());
	echo "<br />";
	var_dump($pdo->errorCode());
}
*/

//$sql = "insert into money values (null, 'test4', 600)";
$sql = "update money set cunkuan=6000 where id = 20";
//exec返回一个受影响的行数，常用于insert这些非查询语句
if(false === ($row_count = $pdo->exec($sql))){
	$errorInfo = $pdo->errorInfo();
	echo "执行失败：".$errorInfo[2];
	
}else {

	echo $row_count;
}
//获得insert操作后最后的auto_increment字段的值
echo "<br>lastID:".$pdo->lastInsertID();








<?php
//data source name
//'mysql: 数据源前缀，说明是何种数据库服务器
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=shop34';

$username = 'root';

$password ='wzdanzsm';

// driver_options 对于当前数据服务器的一些初始化选项
$driver_options  = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', 
	);
//PDO: PHP Data Object
$pdo = new pdo($dsn,$username,$password,$driver_options);

$sql = "show  databases;";
//var_dump($pdo);
$result =  $pdo->query($sql);
//var_dump($result);

//返回关联数组和索引数组
//$list = $result->fetchAll(PDO::FETCH_NUM);
$list = $result->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($list);




<?php

$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=my_test';

$username = 'root';

$password ='wzdanzsm';

// driver_options 对于当前数据服务器的一些初始化选项
$driver_options  = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', 
	);
//PDO: PHP Data Object
$pdo = new pdo($dsn,$username,$password,$driver_options);

//$sql1 = "insert into money values (null, 'test5', 6000)";
//$sql2 = "insert into money values (null, 'test6', 5000)";
//$sql3 = "insert into money values (null, 'test7', 7000)";
//$sql4 = "insert into money values (null, 'test8', 1000)";
//$sql5 = "insert into money values (null, 'test2', 8000)";

/*
// 多种一样的sql语言，执行SQL预编译提升执行效率
// 因为预编译时已经确定了语句结构，不需要用户参与处理
// 可以从根本上防止了SQL注入问题
// 一、统一编译结构
//1、问号占位符
//$sql = "insert into money values (null, ?, ?)";

//2、冒号占位符(推荐，好区分)
$sql = "insert into money values (null, :zhanghu, :cunkuan)";


$stmt = $pdo->prepare($sql);
// 二、绑定数据到中间结果集
//$stmt->bindValue(1,'test3');
$stmt->bindValue(':zhanghu','test3');
$stmt->bindValue(':cunkuan','6000');

// 三、执行
$result = $stmt->execute();

var_dump($result);
*/

//处理多个

$sql = "insert into money values (null, :zhanghu, :cunkuan)";

$stmt = $pdo->prepare($sql);

$data_list = array(
	array('zhanghu'=>'test1','cunkuan'=>5000),
	array('zhanghu'=>'test3','cunkuan'=>5050),
	array('zhanghu'=>'test7','cunkuan'=>4000),
	array('zhanghu'=>'test6','cunkuan'=>5700),
	array('zhanghu'=>'test8','cunkuan'=>9000),
	);
foreach($data_list as $row){

	$stmt->bindValue(':zhanghu',$row[zhanghu]);
	$stmt->bindValue(':cunkuan',$row[cunkuan]);

	$result = $stmt->execute();

	var_dump($result);

}


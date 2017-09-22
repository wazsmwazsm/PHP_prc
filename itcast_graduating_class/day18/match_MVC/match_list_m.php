<?php
	//我是model，数据处理单元
	//初始化MysqlDB
	require_once('./mysqlDB.class.php');

	$config = array(
		'host'=>'localhost',
		'port'=>'3306',
		'username'=>'root',
		'password'=>'wzdanzsm',
		'charset'=>'utf8',
		'dbname'=>'test_football',
	);

	// $dao : Database Access Object 数据库操作对象 (道层)
	$dao = MysqlDB::getInstance($config);

	//获得比赛列表书数据
	$sql = " SELECT t1.t_name as t1_name, m.t1_score, m.t2_score, t2.t_name as t2_name, m.m_time  from `match` as m LEFT JOIN `team` as t1 
	on m.t1_id = t1.t_id LEFT JOIN 	`team` as t2 on m.t2_id = t2.t_id";

	$match_list = $dao->getAll($sql);


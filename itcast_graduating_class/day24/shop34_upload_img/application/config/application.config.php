<?php

//配置文件,用于初始化载入
return array(
	'db' => array(//数据库信息组
		'host'=>'localhost',
		'port'=>'3306',
		'username'=>'shop34',
		'password'=>'wzdanzsm',
		'charset'=>'utf8',
		'dbname'=>'shop34',
		),
	'app' => array(//应用程序组
		'default_platform' => 'back',
		'dao'			   => 'pdo', //pdo、mysql
		'table_prefix'	   => 'p34_', //表前缀
		),
	'back' => array(//后台组
		'default_controller' => 'Admin',
		'default_action' => 'login',
		),
	'front' => array(//前台组
		),
	'test' => array(//测试组
		'default_controller' => 'Match',
		'default_action' => 'list',
		),
	);





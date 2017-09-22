<?php
//我是index.php，项目中也叫我前端控制器(MVC角度)、
//请求分发器(功能角度)，入口文件

//确定分发参数
//使用分发参数的方法可以保证无论前端控制器有多少个动作都能用一个控制器
//来正常处理，而不用每个动作都写一行控制器操作的代码

//这里其实应该用常量来存储分发参数，保证一次请求周期内
//控制器和动作不被更改,防止发生混乱

//控制器分发参数c
/*
$default_contorlloer = 'Match';
$c = isset($_GET['c']) ? $_GET['c'] : $default_contorlloer;

//动作分发参数a
$default_action = 'list';
$a = isset($_GET['a']) ? $_GET['a'] : $default_action; */

//平台分发参数
$default_platform = 'test';
define('PLATFORM',isset($_GET['p']) ? $_GET['p'] : $default_platform);

//常量保存分发参数
$default_contorlloer = 'Match';
define('CONTROLLER',isset($_GET['c']) ? $_GET['c'] : $default_contorlloer);
 
$default_action = 'list';
define('ACTION',isset($_GET['a']) ? $_GET['a'] : $default_action);

 
//实例化控制器类
//拼凑控制器名
$controller_name = CONTROLLER.'Controller';
//凡是载入平台资源的都要改变
require './application/'.PLATFORM.'/controller/'.$controller_name.'.class.php';
//实例化
$controller = new $controller_name();
//调用方法
//拼凑当前的方法动作名字符串
$action_name = ACTION.'Action';
$controller->$action_name(); //可变方法


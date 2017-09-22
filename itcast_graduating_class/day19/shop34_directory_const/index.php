<?php
//我是index.php，项目中也叫我前端控制器(MVC角度)、
//请求分发器(功能角度)，入口文件


//确定分发参数

//平台分发参数
$default_platform = 'test';
define('PLATFORM',isset($_GET['p']) ? $_GET['p'] : $default_platform);

//常量保存分发参数
$default_contorlloer = 'Match';
define('CONTROLLER',isset($_GET['c']) ? $_GET['c'] : $default_contorlloer);
 
$default_action = 'list';
define('ACTION',isset($_GET['a']) ? $_GET['a'] : $default_action);

//目录常量的定义
define('ROOT_PATH',getCWD().'/'); //注意这里是绝对路径
define('APPLICATION_PATH',ROOT_PATH.'application/');
define('FREAMEWORK_PATH',ROOT_PATH.'framework/');

//当前平台相关路径常量
define('CURENT_CONROLLER_PATH', APPLICATION_PATH.PLATFORM.'/controller/');
define('CURENT_MODEL_PATH', APPLICATION_PATH.PLATFORM.'/model/');
define('CURENT_VIEW_PATH', APPLICATION_PATH.PLATFORM.'/view/');


//在入口文件中添加自动加载函数并注册
function userAutoload($className){

	//测试类要被加载几次的测试代码
	// echo "<pre>";
	// var_dump($className);
	// echo "</pre>";

	//先处理可以确定的(框架中的核心类)
	//类名与类文件映射数组
	$framework_class_list = array(
		//'类名'' => '类文件地址'
		'Controller' => FREAMEWORK_PATH.'Controller.class.php',
		'Model' => FREAMEWORK_PATH.'Model.class.php',
		'Factory' => FREAMEWORK_PATH.'Factory.class.php',
		'MysqlDB' => FREAMEWORK_PATH.'MysqlDB.class.php',
		);

	//判断是否为核心类 
	if(isset($framework_class_list[$className])){
		//是核心类
		require $framework_class_list[$className];
	}

	//判断是否为可增加类(模型类，控制器类)
	//控制器类,截取后10个字符，匹配字符串
	elseif(substr($className,-10) == 'Controller'){
		//控制器类，当前平台下的controller目录
		require CURENT_CONROLLER_PATH.$className.'.class.php';
	}
	//模型类
	elseif(substr($className,-5) == 'Model'){
		//模型类，当前平台下的model目录
		require CURENT_MODEL_PATH.$className.'.class.php';
	}

}

//注册自动加载函数
spl_autoload_register('userAutoload');

 
//实例化控制器类
//拼凑控制器名
$controller_name = CONTROLLER.'Controller';

//实例化
$controller = new $controller_name();
//调用方法
//拼凑当前的方法动作名字符串
$action_name = ACTION.'Action';
$controller->$action_name(); //可变方法


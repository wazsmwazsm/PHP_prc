<?php

//框架初始化功能类

class Framework{

	//入口方法

	public static function run(){
		
		//路径常量声明
		static::_initPathConst();

		//初始化配置文件
		static::_initConfig();
 		
 		//初始化分发参数
		static::_initDispatchParam();

		//声明当前路常量
		static::_initPlatformPathConst();

		//注册自动加载
		static::_initAuoload();

		//分发请求
		static::_dispatch();

	}


	//路径常量声明
	private static function _initPathConst(){
		//目录常量的定义
		define('ROOT_PATH',getCWD().'/'); //注意这里是绝对路径
		define('APPLICATION_PATH',ROOT_PATH.'application/');
		define('CONFIG_PATH',APPLICATION_PATH.'config/');
		define('FREAMEWORK_PATH',ROOT_PATH.'framework/');
		define('TOOL_PATH',FREAMEWORK_PATH.'tool/');
		define('DAO_PATH', FREAMEWORK_PATH.'dao/');
	}

	//初始化配置

	private static function _initConfig(){
		//声明超全局变量，便于整个项目都能用
		$GLOBALS['config'] = require CONFIG_PATH.'application.config.php';

	}


	//初始化分发参数
	private static function _initDispatchParam(){
		//平台分发参数
		$default_platform = $GLOBALS['config']['app']['default_platform'];
		define('PLATFORM',isset($_GET['p']) ? $_GET['p'] : $default_platform);

		//常量保存分发参数,注意一下这里常量的写法，常量本身代表字符串，不要再加引号了
		$default_contorlloer = $GLOBALS['config'][PLATFORM]['default_controller'];
		define('CONTROLLER',isset($_GET['c']) ? $_GET['c'] : $default_contorlloer);
		 
		$default_action = $GLOBALS['config'][PLATFORM]['default_action'];;
		define('ACTION',isset($_GET['a']) ? $_GET['a'] : $default_action);

	}

	//声明当前路常量
	private static function _initPlatformPathConst(){
		//当前平台相关路径常量
		define('CURRENT_CONROLLER_PATH', APPLICATION_PATH.PLATFORM.'/controller/');
		define('CURRENT_MODEL_PATH', APPLICATION_PATH.PLATFORM.'/model/');
		define('CURRENT_VIEW_PATH', APPLICATION_PATH.PLATFORM.'/view/');

	}



	//自动加载方法

	public static function userAutoload($className){

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
			'MySQLDB' => DAO_PATH.'MySQLDB.class.php',
			'PDODB' => DAO_PATH.'PDODB.class.php',
			'I_DAO' => DAO_PATH.'I_DAO.interface.php',
			'DAO' => DAO_PATH.'DAO.class.php',
			'SessionDB' => TOOL_PATH.'SessionDB.class.php',
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
			require CURRENT_CONROLLER_PATH.$className.'.class.php';
		}
		//模型类
		elseif(substr($className,-5) == 'Model'){
			//模型类，当前平台下的model目录
			require CURRENT_MODEL_PATH.$className.'.class.php';
		}

	}

	//注册自动加载方法
	private static function _initAuoload(){
		//用__CLASS__代替类名
		spl_autoload_register(array(__CLASS__, 'userAutoload'));
	}
	//分发请求
	private static function _dispatch(){
		//实例化控制器类
		//拼凑控制器名
		$controller_name = CONTROLLER.'Controller';

		//实例化
		$controller = new $controller_name();
		//调用方法
		//拼凑当前的方法动作名字符串
		$action_name = ACTION.'Action';
		$controller->$action_name(); //可变方法


	}


}









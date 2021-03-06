<?php

//基础模型类，给其他功能模型来继承，实现公共的处理模块


class Model implements I_DAO_CHECK{
	//存储DAO对象的属性，可以在每个子类中被访问
	protected $_dao;

	//初始化DAO的功能
	protected function _initDAO(){
		$config = $GLOBALS['config']['db'];
		//配置选择DAO类
		$dao_class = $this->_checkDB();
		
		$this->_dao = $dao_class::getInstance($config);
	}

	//选择DAO类
	//@return string 
	public function _checkDB(){
		switch ($GLOBALS['config']['app']['dao']){
			case 'mysql':
					$dao_class = 'MySQLDB';
					break;
			case 'pdo':
					$dao_class = 'PDODB';
					break;
			default:
					break;
		}
		return $dao_class;
	}

	//实例化的时候需要进行连接数据库等，所以要在
	//构造函数将基础类的模块调用
	//写在基础类中的好处：子类延续父类的构造方法，子类只要专注自己的事情即可
	//构造方法写成protected和private则不能被子类使用，因为实例化的过程是在类
	//外面执行的，相当于类外调用protected的方法，所以要写成public
	public function __construct(){
		$this->_initDAO();
	}
}


/*
测试一下，如果protected的构造函数，既是是自己的实例化也
会不成功的

$o1 = new Model();
*/






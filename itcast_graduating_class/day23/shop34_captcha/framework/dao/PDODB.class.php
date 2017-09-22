<?php

class PDODB implements I_DAO {

	//数据库相关变量
	private $_host;
	private $_port;
	private $_username;
	private $_password;
	private $_charset;
	private $_dbname;

	private $_dsn;
	private $_driver_options;
	private $_pdo;

	private static $_instance; //单例对象
	
	private function __construct($config){
		//初始化数据库操作
		$this->_initParams($config);
		//初始化DSN
		$this->_initDSN();
		//初始化驱动选项
		$this->_initDriverOptions();
		//初始化pdo对象
		$this->_initPDO();
	}

	private function __clone(){}

	//实现单例
	public static function getInstance($config){
		//换个写法!isset(static::$_Instance)
		if(! static::$_instance instanceof static){
			static::$_instance = new static($config);
		}
		return static::$_instance;
	}
	
	//初始化数据库参数
	private function _initParams($config){
		$this->_host = isset($config['host']) ? $config['host'] : 'localhost';
		$this->_port = isset($config['port']) ? $config['port'] : '3306';
		$this->_username = isset($config['username']) ? $config['username'] : 'root';
		$this->_password = isset($config['password']) ? $config['password'] : '12345';
		$this->_charset = isset($config['charset']) ? $config['charset'] : 'utf8';
		$this->_dbname = isset($config['dbname']) ? $config['dbname'] : '';	
	}

	//初始化DSN
	private function _initDSN(){
		$this->_dsn = "mysql:host=$this->_host;post=$this->_port;dbname=$this->_dbname";

	}
	//初始化驱动选项
	private function _initDriverOptions(){
		$this->_driver_options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $this->_charset",
			);

	}

	//初始化PDO
	private function _initPDO(){
		$this->_pdo = new PDO($this->_dsn, $this->_username, $this->_password, $this->_driver_options);

	}

	//请求执行SQL语句
	public  function query($sql){
		if(!$result = $this->_pdo->query($sql))
		{
			$error_info = $this->_pdo->errorInfo();
			echo "<br />sql语句执行失败";
			echo "<br />失败语句: ".$sql;
			echo "<br />错误信息: ".$error_info[2];
			echo "<br />失败错误代号: ".$error_info[1];
			die();
		}
		return $result;

	}

	public  function getAll($sql){
		//执行语句
		$result = $this->query($sql);
		//获取数据
		$list =  $result->fetchAll(PDO::FETCH_ASSOC);
		//释放一下结果集
		$result->closeCursor();
		return $list;
	}

	public  function getRow($sql){
		//执行语句
		$result = $this->query($sql);
		//获取数据
		$row =  $result->fetch(PDO::FETCH_ASSOC);
		//释放一下结果集
		$result->closeCursor();
		return $row;
	}

	public  function getOne($sql){
		//执行语句
		$result = $this->query($sql);
		//获取数据
		$string =  $result->fetchColumn();
		//释放一下结果集
		$result->closeCursor();
		return $string;
	}


	public  function escapeString($data){
		return $this->_pdo->quote($data);
	}

}











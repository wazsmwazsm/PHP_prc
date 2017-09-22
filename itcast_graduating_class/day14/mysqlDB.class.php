<?php

//类名习惯上要和文件名相同
/*
	定义一个类，可以链接mysql数据库，
	并返回连接后的资源


*/
class mysqlDB{
	
	public $host;
	public $port;
	public $username;
	public $password;
	public $charset;
	public $dbname;
	
	//连接结构（资源）
	static $link;
	
	//构造函数
	function __construct($config)
	{
		$this->host = isset($config['host']) ? $config['host'] : 'localhost';
		$this->port = isset($config['port']) ? $config['port'] : '3306';
		$this->username = isset($config['username']) ? $config['username'] : 'root';
		$this->password = isset($config['password']) ? $config['password'] : '12345';
		$this->charset = isset($config['charset']) ? $config['charset'] : 'utf8';
		$this->dbname = isset($config['dbname']) ? $config['dbname'] : '';
		//连接数据库
		self::$link = $this->connect();
		//设定连接编码
		$this->setCharset($this->charset);
		//选定数据库
		$this->selectDB($this->dbname);

	}
	
	function __destruct()
	{
		mysql_close(self::$link);
		
	}
	
	//进行数据库连接
	public function connect()
	{
		// 这里的link变量是一个普通变量，属于方法内的局部变量
		$link = mysql_connect("$this->host:$this->port","$this->username","$this->password") or die("连接数据库失败");
		return $link;
	}
	
	//设定连接编码
	public function setCharset($charset)
	{
		mysql_set_charset($charset,self::$link);
		
		
	}
	//选定数据库
	public function selectDB($db)
	{
		mysql_select_db($db,self::$link);
	}
	
	
	
}


$config = array(
	'host'=>'localhost',
	'port'=>'3306',
	'username'=>'root',
	'password'=>'wzdanzsm',
	'charset'=>'utf8',
	'dbname'=>'greet',
);

$link = new mysqlDB($config);

$result = $link->query();






















?>
<?php

//类名习惯上要和文件名相同
/*
	定义一个类，可以链接mysql数据库，
	并返回连接后的资源
	实现其单例模式
	该类还能完成如下基本操作
	1、执行普通的增删改并返回结果将于
	2、执行select语句并返回3种类型的数据
		多行结果（二维数组），单行结果（一维数组），单行单列（单个数据）

*/ 
class mysqlDB{
	
	//私有化，封装
	private $host;
	private $port;
	private $username;
	private $password;
	private $charset;
	private $dbname;
	
	//这里Instance作为一个对象用来取得单例对象
	private static $Instance;
	//连接结构（资源）
	private $resource;
	 
	//取得单例对象
	public static function getInstance($config)
	{
		if(!isset(self::$Instance))
		{
			//这样也可理解为self::$Instance = self::__construct();	
			self::$Instance = new self($config);	
		}
		return self::$Instance;
	}
	
	//构造函数
	private function __construct($config)
	{
		$this->host = isset($config['host']) ? $config['host'] : 'localhost';
		$this->port = isset($config['port']) ? $config['port'] : '3306';
		$this->username = isset($config['username']) ? $config['username'] : 'root';
		$this->password = isset($config['password']) ? $config['password'] : '12345';
		$this->charset = isset($config['charset']) ? $config['charset'] : 'utf8';
		$this->dbname = isset($config['dbname']) ? $config['dbname'] : '';
		//连接数据库
		$this->connect();
		//设定连接编码
		$this->setCharset($this->charset);
		//选定数据库
		$this->selectDB($this->dbname);

	}
	
	//序列化函数
	public function __sleep()
	{
		echo "序列化。。。";
		//清理资源
		mysql_close($this->resource);
		//如果定义了改__sleep方法，则必须返回一个数组才能进行序列化
		return array('host','port','username','password','charset','dbname');
	}
	
	//反序列化函数
	//注意不要写成private，不然无法调用
	public function __wakeup()
	{
		//连接数据库
		$this->connect();
		//设定连接编码
		$this->setCharset($this->charset);
		//选定数据库
		$this->selectDB($this->dbname);		
	}
	
	
	
	//禁止克隆
	private function __clone(){}
	
	/* 这个不要，不然session入库的写操作会失败
	   因为在脚本周期结束前，会销毁对象，而销毁
	   对象之前会调用析构函数，先将resource释放了
	   而之后执行session的入库写操作(php脚本引擎自动的)，而此时的
	   session写操作去请求一个sql语句会找不到数据库
	   连接资源。
	   当然对象此时还没有被销毁，可以去请求sql，但是
	   resource资源在析构函数中被释放类，变成一个unknown资源


	public function __destruct()
	{
		mysql_close($this->resource);
		
	}*/
	
	//进行数据库连接
	private function connect()
	{
		
		$this->resource = mysql_connect("$this->host:$this->port","$this->username","$this->password") or die("连接数据库失败");
		
	}
	
	//设定连接编码
	public function setCharset($charset)
	{
		//mysql_set_charset($charset,$this->resource);
		//这么写的好处是可以进行统一的错误处理
		$this->query("set names $charset",$this->resource);
		
	}
	//选定数据库
	public function selectDB($db)
	{	
		//mysql_select_db($db,$this->resource);
		$this->query("use $db",$this->resource);
	}
	
	//执行sql语句
	public function query($sql)
	{
		if(!$result = mysql_query($sql,$this->resource))
		{
			echo "<br />sql语句执行失败";
			echo "<br />失败语句: ".$sql;
			echo "<br />错误信息: ".mysql_error();
			echo "<br />失败错误代号: ".mysql_errno();
			die();
		}
		return $result;
	}
	
	//执行select语句，返回二维数组
	public function getAll($sql)
	{
		//调用自己的方法，不要直接调用mysql_query
		//因为自己的方法如果query失败就die了，不会继续执行
		$result = $this->query($sql);
		$arr = array();
		while($rec = mysql_fetch_assoc($result))
		{
			$arr[] = $rec;	
		}
		return $arr;
	}
	//执行select语句，返回一维数组
	public function getRow($sql)
	{
		$result = $this->query($sql);
		
		if($rec = mysql_fetch_assoc($result))
		{
			//有数据就返回一行 
			return $rec;	
		}
		return false; 
	}
	//执行select语句，返回单个数据,返回select语句的第一行第一列
	public function getOne($sql)
	{
		$result = $this->query($sql);
		$rec = mysql_fetch_row($result);//返回下标为数字的数组，且下标一定是0、1、2、3...
		
		// 如果select没有数据返回假
		if($rec === false)
		{
			return false;	
		}
		return $rec[0]; // 返回数组的第一项 
	}
	
	//转义用户数据，防止SQL注入
	//@param $data string 待转换的字符串
	//@return 转换后的字符串
	public function escapeString($data){
		//强制添加单引号，防止用户输入整型数据等，sql语句就不用再加引号了
		return "'".mysql_real_escape_string($data,$this->resource)."'";

	}
} 

 
 

/*

测试用代码

$config = array(
	'host'=>'localhost',
	'port'=>'3306',
	'username'=>'root',
	'password'=>'wzdanzsm',
	'charset'=>'utf8',
	'dbname'=>'greet',
);


$link =mysqlDB::getInstance($config);
$link2 =mysqlDB::getInstance($config);

echo "<pre>";
var_dump($link);
echo "</pre>";
echo "<pre>";
var_dump($link2);
echo "</pre>";
*/



















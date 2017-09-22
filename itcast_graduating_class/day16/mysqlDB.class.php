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
	
	//这里link作为一个对象
	private static $link;
	//连接结构（资源）
	private $resource;
	
	//取得单例对象
	public static function getInstance($config)
	{
		if(!isset(self::$link))
		{
			//这样也可理解为self::$link = self::__construct();	
			self::$link = new self($config);	
		}
		return self::$link;
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
	
	public function __destruct()
	{
		mysql_close($this->resource);
		
	}
	
	//进行数据库连接
	private function connect()
	{
		// 这里的link变量是一个普通变量，属于方法内的局部变量
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


















?>
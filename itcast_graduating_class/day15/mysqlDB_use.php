<?php

require_once('mysqlDB.class.php');



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php


$config = array(
	'host'=>'localhost',
	'port'=>'3306',
	'username'=>'root',
	'password'=>'wzdanzsm',
	'charset'=>'utf8',
	'dbname'=>'my_test',
);

// 创建资源
$link = mysqlDB::getInstance($config);


// 1、插入数据
$sql = "insert into money (zhuanghu, cunkuan) values ('test3',6000);";

/*if($link->query($sql))
{
	echo "执行成功！";
	
}*/


//2、获取账户信息
$sql = "select * from money";
$result = $link->getAll($sql);

echo "<table border=\"1\">";
	foreach($result as $row)
	{
		echo "<tr>";
		foreach($row as $key => $value)
		{
			echo "<td>$value</td>";
		}
		echo "</tr>";
	}
echo "</table>";


//3、获取某个账户信息
$sql = "select * from money where id = 1";
$row = $link->getRow($sql);
//放表格
echo "<table border=\"1\"><tr>";
	foreach($row as $key => $value)
	{
		echo "<td>";
		echo "$value";
		echo "</td>";
	}
echo "</tr></table>";
//自定义显示
if($row)
{
	echo "<br />账户ID为：".$row['id'];
	echo "<br />账户名为：".$row['zhuanghu'];
	echo "<br />存款为：".$row['cunkuan'];	
	
}
else
{
	echo "<br />账户不存在！";	
	
}


//3、获取所有存款总和

$sql =  "select sum(cunkuan) as '存款总和:' from money;";
$result = $link->getOne($sql);


echo "<br />存款总和为$result";	

?>
</body>
</html>
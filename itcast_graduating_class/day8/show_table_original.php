<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
require_once('sql_fns.php');

$db = $_GET['db'];

//第二次还得写连接，因为PHP页面执行完毕即释放链接
mysql_connect("localhost","root","wzdanzsm");
mysql_set_charset("utf8");
mysql_select_db($db);

$sql = "show tables;";

$result = mysql_query($sql);
if(!$result)
{
	echo "执行失败：".mysql_error();	
}
else
{
	$filedCount = mysql_num_fields($result);
	
	echo "<table border=\"1\">";
	//表头
	echo "<tr>";
	for($i = 0; $i < $filedCount; ++$i)
	{
		$filedName = mysql_field_name($result, $i);
		echo "<td>{$filedName}</td>";
		echo "<td colspan='2'>操作</td>";
	}
	echo "</tr>";
	
	//内容
	
	while($row = mysql_fetch_assoc($result))
	{
		echo "<tr>";
		for($i = 0; $i < $filedCount; ++$i)
		{
			$filedName = mysql_field_name($result, $i);
			echo "<td>".$row[$filedName]."</td>";
			echo "<td><a href='show_struct.php?db={$db}&tab={$row[$filedName]}'>查看结构</a></td>";
			echo "<td><a href='show_data.php?db={$db}&tab={$row[$filedName]}'>查看数据</a></td>";
		}
		echo "</tr>";
	}
	
	
	echo "</table>";
}
?>
</body>
</html>
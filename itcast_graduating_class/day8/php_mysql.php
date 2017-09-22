<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
// 1 连接数据库
$mylink = mysql_connect("localhost","saixin","wzdanzsm");

// 2 设定编码,也可使用mysql_query
mysql_set_charset("utf8");

// 3 选择数据库

mysql_select_db("saixinjituan");

// 4 执行sql命令

//返回的结果通常需要分两种情形进行处理：
//4.1：如果是无返回数据的语句：
//4.1.1 如果$result为true，表示执行成功

//返回数据的select语句
$sql = "select id, title from 007_news order by id asc limit 0, 10;";

$result = mysql_query($sql);

if(!$result)
{
	echo "失败，请参考失败信息：".mysql_error();
	
}
else
{
	echo "<table border=\"1\">";
	while($record = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$record['id']."</td>";
		echo "<td>".$record['title']."</td>";
		echo "</tr>";	
		
	}
	echo "</table>";
}


//显示各种返回数据的SQL语句，设置一个可以返回任何结果的结构
//用到函数: mysql_num_fields($result) 返回列数(字段数) 
// mysql_field_name($result, $i) 返回字段，i为引索

$sql = "desc 007_news;";
$sql = "show charset;";
$sql = "show variables like 'character%';";
$sql = "show collation;"; //字符串排序规则
$result = mysql_query($sql);

if(!$result)
{
	echo "失败，请参考失败信息：".mysql_error();
	
}
else
{
	//取得字段个数
	$fieldCount = mysql_num_fields($result);
	
	//表格格式输出
	echo "<table border=\"1\">";
	//表头部分
	echo "<tr>";
	for($i = 0; $i < $fieldCount; ++$i)
	{
		//取得字段名
		$fileName = mysql_field_name($result,$i);	
		echo "<td>".$fileName."</td>";
		
	}
	echo "</tr>";
	//内容部分
	while($record = mysql_fetch_array($result,MYSQL_ASSOC))
	{
		echo "<tr>";
		for($i = 0; $i < $fieldCount; ++$i)
		{
			//取得字段名
			$fileName = mysql_field_name($result,$i);	
			//也可以echo "<td>".$record[$i]."</td>";
			//此时则需改变mysql_fetch_array($result,MYSQL_NUM)
			echo "<td>".$record[$fileName]."</td>";
			
		}	
		echo "</tr>";	
		
	}
	echo "</table>";
}

?>
</body>
</html>
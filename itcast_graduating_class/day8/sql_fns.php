<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

function mysql_show($flag = "MY_DB")
{	

	mysql_connect("localhost","root","wzdanzsm");
	//如果有传入变量，即进行选择数据库，只显示数据库时不选择
	if(!empty($_GET) && $flag != "MY_DB")
	{
		$db = $_GET['db'];
		$tab = $_GET['tab'];
		
		mysql_select_db($db);
	}


	mysql_set_charset("utf8");
	//不同传入值对应的不同SQL语句
	$query = array(
					"MY_DB" => "show databases;",
					"MY_TAB" => "show tables;",
					"MY_TAB_STRUCT" => "desc $tab ;",
					"MY_TAB_DATA" => "select * from $tab ;",
					);
					
	$sql = $query[$flag];
	
	$result = mysql_query($sql);
	if(!$result)
	{
		echo "执行失败：".mysql_error();	
	}
	else
	{
		//取得字段数
		$filedCount = mysql_num_fields($result);
		
		//输出格式为表格
		echo "<table border=\"1\">";
		//表头
		echo "<tr>";
		for($i = 0; $i < $filedCount; ++$i)
		{
			$filedName = mysql_field_name($result, $i);
			echo "<td>{$filedName}</td>";
			//判断是显示数据库还是显示表、结构、数据
			switch($flag)
			{
				case 'MY_DB' : echo "<td>操作</td>";break;
				case 'MY_TAB' : echo "<td colspan='2'>操作</td>";break;
				default : break;
			}
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
			//判断是显示数据库还是显示表、结构、数据
				switch($flag)
				{
					case 'MY_DB' : echo "<td><a href='show_table.php?db={$row[$filedName]}'>查看表</a></td>";
								   break;
					case 'MY_TAB' : echo "<td><a href='show_struct.php?db={$db}&tab={$row[$filedName]}'>查看结构</a></td>";
									echo "<td><a href='show_data.php?db={$db}&tab={$row[$filedName]}'>查看数据</a></td>";
								    break;
					default : break;
				}
				
			}
			echo "</tr>";
		}
		
		
		echo "</table>";
	}
}
?>
</body>
</html>
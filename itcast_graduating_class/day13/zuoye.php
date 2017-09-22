<?php

mysql_connect('localhost','root','wzdanzsm');

mysql_query("set names utf8");

mysql_select_db('my_test');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
if($_POST)
{
	
	$out = $_POST['out'];	
	$in = $_POST['in'];
	$money = $_POST['money'];
	
	mysql_query("start transection");
	//注意字符串在sql中需要单引号
	$sql_up1 = "update money set cunkuan = cunkuan - $money 
				where zhuanghu='$out'";
	$sql_up2 = "update money set cunkuan = cunkuan + $money 
				where zhuanghu='$in'";
	
	$result1 = mysql_query($sql_up1);
	$err1 = mysql_error();
	
	$result2 = mysql_query($sql_up2);
	$err2 = mysql_error();
	
	if($result1 === false || $result2 === false)
	{
		echo "转账失败: ".$err1.$err2;
		mysql_query("rollback;");	
	}
	else
	{
		mysql_query("commit;");	
		//以防刷新继续执行，刷新到一个全新页面
		header("location:zuoye.php?msg=1");
		
	}
}
if(!empty($_GET['msg']))
{
	if($_GET['msg'] == '1')
	{
		echo "转账成功";
	}
}


?>
<form action="" method="post">
<h2>转账(汇款)系统</h2><br />
转出账户：<input type='text' name="out"  /><br />
转入账户：<input type='text' name="in"  /> <br />
转出金额：<input type='text' name="money"  /><br />
<button type="submit">提交</button><br />
</form>
<h1>当前资金状况：</h1>
<?php

$sql = "select * from money";
$result = mysql_query($sql);
if($result == false)
{
	echo "执行失败",mysql_error();	
}
else
{
	echo "<table border=\"1\">";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<tr>";
		echo "<td>{$row['zhuanghu']}</td>";
		echo "<td>{$row['cunkuan']}</td>";
		echo "</tr>";
	}
	
	echo "</table>";
}

?>
</body>
</html>
<?php
	header("Content-Type:text/html;charset=utf-8");


	mysql_connect("localhost","root","wzdanzsm");	
	mysql_set_charset("utf8");
	mysql_query("use my_test;");
		
		
if($_POST)
{
	$user = $_POST['user'];
	$passwd = $_POST['passwd'];
	$age = $_POST['age'];
	$degree = $_POST['degree'];
	$hobby = $_POST['hobby'];	//注意：这是数组
	$from = $_POST['from'];
	
	if(empty($user) || empty($passwd))
	{
		$errMsg = "用户名密码不能为空";		
	}
	else
	{
		//单独需要对$hobby做处理：
		//该数据原始，类似这样的一个数组：array(1, 4), 或array(1,2, 8), 或array(8);
		//但存入数据库的时候，其实应该将他们每一项的值“相加”之后求和的结果，
		//即二进制位运算，则：
		$hobby_sum = array_sum($hobby);
		$sql = "insert into user_list
				(`user`, `password`, `age`, `degree`,
				 `hobby`, `from`, `reg_time`) ";
		$sql .= "values ('$user','$passwd','$age','$degree',
				'$hobby_sum','$from',now())"; //这里使用了MYSQL的now()函数
		
		
		$result = mysql_query($sql);
		if($result == false)
		{
			$errMsg = "执行失败：".mysql_error();
		}
		else
		{
			$errMsg = "添加成功。";
		}
	}
	
}

if($_GET)
{
	//因为可能有多个get数据提交，所以要判断是否是id
	if(!empty($_GET['id']))
	{
		$id = $_GET['id'];	
		$sql = "delete from user_list where id = {$id}";
		if($result = mysql_query($sql) === false)		
		{
			$errMsg = "执行失败，请参考：" . mysql_error();
		}
		else
		{
			$errMsg = "删除成功。";
			header("location:".$_SERVER['PHP_SELF']."?page={$_GET['page']}");
		}
	}
	
	
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<div class="errMsg">
<?php
	if(!empty($errMsg))
		echo $errMsg;
?>


</div>


<form action="" method="post">
<h2>添加数据</h2>
用户名：
<input type="text" name="user" min="3" max="10" maxlength="10" />
<br />
密码：
<input type="password"  name="passwd" min="3" max="10" maxlength="10" />
<br />
年龄：
<input type="text" name="age" min="1" max="2" maxlength="2" />
<br />
学历：
<select name="degree">
	<option value="1">高中</option>
	<option value="2">大专</option>
	<option value="3">本科</option>
	<option value="4">研究生</option>
</select>
<br />
兴趣：
<!-- 这里写成1 2 4 8 16 是为了对应数据库的set数据集 -->
<input type="checkbox" name="hobby[]" value="1" />排球&nbsp;
<input type="checkbox" name="hobby[]" value="2" />篮球&nbsp;
<input type="checkbox" name="hobby[]" value="4" />足球&nbsp;
<input type="checkbox" name="hobby[]" value="8" />棒球&nbsp;
<input type="checkbox" name="hobby[]" value="16" />乒乓球&nbsp;
<br  />
来自：
<input type="radio" name="from" value="1" />东北&nbsp;
<input type="radio" name="from" value="2" />华北&nbsp;
<input type="radio" name="from" value="3" />西北&nbsp;
<input type="radio" name="from" value="4" />华东&nbsp;
<input type="radio" name="from" value="5" />华南&nbsp;
<input type="radio" name="from" value="6" />西南&nbsp;
<input type="radio" name="from" value="7" />西西&nbsp;

<button type="submit">OK</button>
</form>

<hr />
<div>
<?php
//分页

$pageSize = 10;

if(empty($_GET['page']))
{
	$page = 1;
	$pageStart = 0;
}
else
{
	$page = $_GET['page'];
	$pageStart = ($page - 1) * $pageSize;
}

$record = mysql_num_rows(mysql_query("select * from user_list"));

$pageCount = ceil($record / $pageSize);

//写的全一点为了以后方便
$sql = "select * from user_list 
		where 1=1  
		order by id asc 
		limit {$pageStart},{$pageSize};";

$result = mysql_query($sql);
if($result === false){
	echo "数据获取失败".mysql_error();
}
else{
	//或者SCRIPT_NAME也可以,或者魔术常量__FILE__是绝对路径
	$fileName = $_SERVER['PHP_SELF'];

	echo "<table border=\"1\">";
	//取得字段数
	$field_count = mysql_num_fields($result);
	//输出表格标题
	echo "<tr>";
	for($i = 0; $i < $field_count; ++$i)
	{
		echo "<td>".mysql_field_name($result,$i)."</td>";	
	}
	echo "<td>操作</td>";	
	echo "</tr>";	
	//输出表格内容
	while($record = mysql_fetch_assoc($result))
	{
		echo "<tr>";
		for($i = 0; $i < $field_count; ++$i)
		{
			echo "<td>".$record[mysql_field_name($result,$i)]."</td>";	
		}
		echo "<td><a href='javascript:void(0)' onclick='con_del(".$record['id'].",".$page.")'>删除</a></td>";
		echo "</tr>";
		
	}
	echo "</table>";
	//显示分页
	echo "<tr>";
	for($i = 1; $i <= $pageCount; ++$i)
	{
		if($i == $page)
		{
			echo "<span>$i &nbsp;</span>";
		}
		else
		{
			echo "<a href='{$fileName}?page=$i'>$i &nbsp;</a>";	
		}
	}
	echo "</tr>";
}



?>
</div>
<script type="text/javascript">
function con_del(id,page)
{
	if(window.confirm("真的要删除吗？"))
	{
		window.location.href = '<?php echo $fileName; ?>'+'?id='+id+'&page='+page;
	}
}


</script>
</body>
</html>
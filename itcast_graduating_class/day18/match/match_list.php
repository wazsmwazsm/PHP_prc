<?php

	header('Content-type:text/html;charset=utf-8');

	//初始化MysqlDB
	require_once('./mysqlDB.class.php');

	$config = array(
		'host'=>'localhost',
		'port'=>'3306',
		'username'=>'root',
		'password'=>'wzdanzsm',
		'charset'=>'utf8',
		'dbname'=>'test_football',
	);

	// $dao : Database Access Object 数据库操作对象 (道层)
	$dao = MysqlDB::getInstance($config);

	//获得比赛列表书数据
	$sql = " SELECT t1.t_name as t1_name, m.t1_score, m.t2_score, t2.t_name as t2_name, m.m_time  from `match` as m LEFT JOIN `team` as t1 
	on m.t1_id = t1.t_id LEFT JOIN 	`team` as t2 on m.t2_id = t2.t_id";

	$match_list = $dao->getAll($sql);
?>

<!-- 好的编写方式：先处理业务逻辑，再解决显示 -->
<!-- 利用html代码展示结果 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>比赛列表</title>
</head>
<body>
<table>
	<tr>
		<th>球队一</th>
		<th>比分</th>
		<th>球队二</th>
		<th>时间</th>
	</tr>
	<!-- 将foreach写成下面这样的语法以方便找到嵌套关系 -->
	<?php foreach($match_list as $row) : ?>
	<tr>
		<td><?php echo $row['t1_name']; ?></td>
		<td><?php echo $row['t1_score']." : ".$row['t2_score']; ?></td>
		<td><?php echo $row['t2_name']; ?></td>
		<td><?php echo date("Y-m-d H:I",$row['m_time']); ?></td>
	</tr>
	<?php endForeach; ?>
</table>

</body>
</html>
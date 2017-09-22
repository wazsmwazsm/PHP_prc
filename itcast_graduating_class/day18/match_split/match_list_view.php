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
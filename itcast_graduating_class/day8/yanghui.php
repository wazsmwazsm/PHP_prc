<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
//输出杨辉三角
$n=8;
echo "<pre>";
for($i=1;$i<=$n;++$i)
{
	for($j=1;$j<=$i;++$j)
	{
		if($j == 1 || $j == $i)
		{
			$arr[$i][$j] = 1;	
		}
		else
		{
			/*if($i == 1)
			{
				//这里本来该处理第一行
				//但是前面的	if($j == 1 || $j == $i) 已经包含此情况
			}
			else
			{*/
				$arr[$i][$j] = $arr[$i-1][$j] + $arr[$i-1][$j-1];
			//}
		}
		echo $arr[$i][$j]."\t";
	
	}
	echo "<br />";	
}
echo "</pre>";

?>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

$arr1 = range(1,2000);
shuffle($arr1);
$len = count($arr1);

echo "Before:<br />";
foreach($arr1 as $key => $value)
{
	echo $key." : ".$value."<br />";	
}

//选择排序和冒泡的不同：选择先找出最大值位置不着急交换
//等循环完了再交换

		
for($i=0;$i < $len - 1; ++$i)	//要比较的次数
{
	//每次循环都需要重置,不然max就不变成为最大了
	$max = $arr1[0];	//取得第一项
	$maxPos = 0;		//取得第一项下标
	for($j=0;$j < $len - $i; ++$j)	//每次比较的数据个数比前一次少一
	{	
		if($arr1[$j] > $max)
		{
			$max = $arr1[$j];
			$maxPos = $j;
		}
	}
	//循环结束后再作交换
	//不要用$max交换,$max只是中间变量，不是引用传值
	//$len - 1 - $i]即当前查找数据的最后一个位置
	$temp = $arr1[$maxPos];
	$arr1[$maxPos] = $arr1[$len - 1 - $i];
	$arr1[$len - 1 - $i] = $temp;
	
}
echo "After:<br />";
foreach($arr1 as $key => $value)
{
	echo $key." : ".$value."<br />";	
}
?>
</body>
</html>
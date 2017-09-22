<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

//注意：二分查找只能在连续的排好序的数组查找
$arr = range(1,100);


$count = 0;

function binary_search($arr, $value, $start, $end)
{
	//必须要判断，不然上下限超出范围后堆栈会溢出
	if($start > $end) return false;
	global $count;
	$count++;
	$mid = floor(($start + $end)/2);
	if( $value == $arr[$mid])
	{	
		return $mid;	
	}
	else if( $value < $arr[$mid])
	{
		$end = $mid - 1;
		return binary_search($arr, $value, $start, $end);
	}
	else
	{
		$start = $mid + 1;
		return binary_search($arr, $value, $start, $end);
	}
	
}
$sr = 25;
$result = binary_search($arr,$sr,0,count($arr)-1);


echo "查找了".$count." 次.<br />";
if(!$result)
{
	echo "$sr 不在数组中.<br />";
}
else
{
	echo "$sr 在数组中的位置为：$result .<br />";
	
}





?>
</body>
</html>
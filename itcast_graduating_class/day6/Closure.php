<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
//call_user_func_array — 调用回调函数，并把一个数组参数作为回调函数的参数
//匿名函数作为回调函数的应用
$s = call_user_func_array(
	function(){
		$a = func_get_args();
		$sum = 0;
		foreach($a as $v)
		{
			$sum += $v;
		}
		return $sum;
	},array(1,2,3,5.5,6,8,9)
);
/* 或者
$fun = function(){
		$a = func_get_args();
		$sum = 0;
		foreach($a as $v)
		{
			$sum += $v;
		}
		return $sum;
	};
$arr = array(1,2,3,5.5,6,8,9);
$s = call_user_func_array($fun,$arr);*/


echo "<hr /> 和为$s";





?>
</body>
</html>
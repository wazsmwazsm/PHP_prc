<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>网页标题</title>
	<meta name="keywords" content="关键字列表" />
	<meta name="description" content="网页描述" />
	<link rel="stylesheet" type="text/css" href="" />
	<style type="text/css"></style>
	<script type="text/javascript"></script>
</head>
<body>
<?php


echo "<h3>3中常见的用户错误</h3>";
trigger_error("用户提示性错误1", E_USER_NOTICE);
trigger_error("用户警告性错误2", E_USER_WARNING);
//trigger_error("用户严重错误3", E_USER_ERROR);

//假设用户输入的年龄数据为$age
$age = 188;
if($age >= 0 && $age <= 100){
	echo "<br />年龄合乎逻辑，继续处理后续工作....";
}
else{
	trigger_error("年龄数据不符合要求！", E_USER_WARNING);
}

//trigger_error("错啦",E_USER_ERROR);

echo "<h3>3中常见的系统错误</h3>";
echo $var1;				//使用不存在的变量
echo "正确代码1";
include 'no-file.php';	//包含不存在的文件
echo "<br />正确代码2";
$m = func1();			//调用不存在的函数
echo "<br />正确代码3";

?>
</body>
</html>

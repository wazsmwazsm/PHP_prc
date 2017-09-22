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
echo "<p>代码(1)</p>";
$m = 10;

include './page3ddddd.php';//不存在的文件
//这里报错，但会继续执行后续代码

echo "<p>代码(2)</p>";

require './page3dddd.php';//不存在的文件
//这里报错，并不再执行后续代码

echo "<p>m = $m </p>";
echo "<p>m2 = $m2 </p>";

echo "<p>代码(3)</p>";

?>
</body>
</html>

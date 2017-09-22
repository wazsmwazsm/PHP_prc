<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

//这样才能反序列化后找到正确的类名
function __autoload($className){
	require './'.$className.'.class.php';	
}

$str = file_get_contents('./mysqldb.txt');


$my = unserialize($str);

echo "<pre>";

var_dump($my);

echo "</pre>";

// 单单这么写无法执行，但是序列化之前数据库是连上的，所以我们想要恢复以前的状态
// 要写魔术方法__sleep和__wakeup
$sql = "select * from money";
$result = $my->getAll($sql);

var_dump($result);


?>
</body>
</html>
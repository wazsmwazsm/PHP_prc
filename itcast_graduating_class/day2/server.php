<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php

echo $_SERVER['REMOTE_ADDR']."<br>";

echo $_SERVER['SERVER_ADDR']."<br>";

echo $_SERVER['DOCUMENT_ROOT']."<br>";
//PHP_SELF此文件的路径,有点像dirname[__FILE__]
echo $_SERVER['PHP_SELF']."<br>";

echo $_SERVER['SERVER_NAME']."<br>";

echo $_SERVER['QUERY_STRING']."<br>";

/*echo "<pre>";
var_dump($_SERVER);
echo "</pre>";*/

echo "<table border=\"1\">";
foreach($_SERVER as $key => $value)
{
	echo "<tr>";
	echo "<td>$key </td>";
	echo "<td>$value </td>";
	echo "</tr>";	
	
}
echo "</table>";
$a = 1;
echo "<pre>";
//$GLOBALS无下划线
var_dump($GLOBALS);
echo "</pre>";


?>
</body>
</html>
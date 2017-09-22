<?php

//获得cookie
echo "<pre>";
var_dump($_COOKIE['class_name']);

//$_COOKIE数组仅仅存储的是浏览器请求时携带的cookie
var_dump($_COOKIE);
echo "</pre>";

?>
<script type="text/javascript">
	//浏览器存储的cookie是可以被其他脚本拿走的
	//但设置类HTTPONLY就只能在http请求中被使用
	console.log(document.cookie);
	window.alert(document.cookie);
</script>



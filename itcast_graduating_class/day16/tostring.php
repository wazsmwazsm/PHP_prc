<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

class A{
	public $p1 = 1;
	public $p2 = 2;	
	
	function __tostring()
	{
		return $this->p1.','.$this->p2;
	}
	
}

$o1 = new A();

//对象不能直接当字符串使用,需要魔术方法__tostring
echo "<br />".$o1;








?>
</body>
</html>
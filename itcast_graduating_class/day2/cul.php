<?php
	//这里传过去的都是string类型
	//可以这么转换成int型，intval和(int)都可以
	$num1 = (int)$_POST["num1"];
	$num2 = (int)$_POST["num2"];
	$yunsuan = $_POST["yunsuan"];
	/*if(!empty($num1) || !empty($num2)){
		echo "<pre>";
		var_dump($_POST); 
		echo "</pre>";
	}*/
	
	switch($yunsuan)
	{
		case "+":echo $num1 + $num2;
			break;
		case "-":echo $num1 - $num2;
			break;
		case "*":echo $num1 * $num2;
			break;
		case "/":
			echo $num2 ? ($num1 / $num2) : "除数为0";		
			break;
	}
	
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<form action="#" method="post">
<!-- 这里无论用number类型还是text类型传过去的都是string型 -->
<input type="number" name="num1" required="required">
<select name="yunsuan">
	<option value="+">+</option>
	<option value="-">-</option>
	<option value="*">*</option>
	<option value="/">/</option>
</select>
<input type="text" name="num2" required>
<input type="submit" value="计算">
</form>
</body>
</html>
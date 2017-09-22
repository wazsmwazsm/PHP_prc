<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

$arr1 = range(1,200);
shuffle($arr1);
$len = count($arr1);

echo "Before:<br />";
foreach($arr1 as $key => $value)
{
	echo $key." : ".$value."<br />";	
}

for($i=0;$i < $len - 1; ++$i)
{
	for($j=0;$j < $len -1 -$i; ++$j)
	{
		if($arr1[$j] > $arr1[$j+1])
		{
			$temp = $arr1[$j];
			$arr1[$j] = $arr1[$j+1];
			$arr1[$j+1] = $temp;	
		}
	}
}
/* OR THIS WAY:
for($i=0;$i < $len - 1; ++$i)
{
	for($j=$i;$j < $len; ++$j)
	{
		if($arr1[$j] < $arr1[$i])
		{
			$temp = $arr1[$j];
			$arr1[$j] = $arr1[$i];
			$arr1[$i] = $temp;	
		}
	}
}*/
echo "After:<br />";
foreach($arr1 as $key => $value)
{
	echo $key." : ".$value."<br />";	
}
?>
</body>
</html>
<?php
header("Content-type:text/html;charset=utf-8");
$num = 10007;
$count = 0;
//或者pow($num,0.5)
for($i=2;$i<=sqrt($num);++$i)
{
	$count++;
	if($num % $i == 0)
	{
			$flag = 1;
			break;
	}
	
}
if($flag)
	echo "$num 不是素数";
else
	echo "$num 是素数";
echo "<br>循环了".$count."次";







?>
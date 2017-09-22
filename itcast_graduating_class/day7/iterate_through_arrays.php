<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
ini_set('display_errors', true);
ini_set("error_reporting",E_ALL | E_STRICT);

//求数组最大值
$arr1 = array(3, 8=>5, 'dd1'=>6, 2, 11=>9, 4);

//方法1
$max = reset($arr1); //第一个设置为最大
foreach($arr1 as $key => $value)
{
	if($value > $max)
		$max = $value;
}

echo "<br />最大值为$max<br />";

//方法2
$max = reset($arr1);//第一个设置为最大
for($i=0;$i < count($arr1);++$i)
{
	$key = key($arr1);
	$value = current($arr1);
	if($value > $max)
		$max = $value;
	//移动指针到下一个位置
	next($arr1);
}

echo "<br />最大值为$max<br />";

//交换
$min = $minpos = reset($arr1);
$max = $maxpos = reset($arr1); 
foreach($arr1 as $key => $value)
{
	if($value > $max)
	{
		$max = $value;
		$maxpos = $key;
	}
	if($value < $min)
	{
		$min = $value;
		$minpos = $key;
	}
	
}
echo "<br />最大值为$max ,位置为$maxpos<br />";
echo "<br />最小值为$min ,位置为$minpos<br />";

echo "交换之前<br />";
print_r($arr1);
$temp = $arr1[$maxpos];
$arr1[$maxpos] = $arr1[$minpos];
$arr1[$minpos] = $temp;

echo "<br />交换之后<br />";
print_r($arr1);echo "<br />";

//each函数
reset($arr1);
$a1 = each($arr1);
echo "<br />";
print_r($a1);
echo "<br />";
$a2 = each($arr1);
echo "<br />";
print_r($a2);
echo "<br />";

//list不是函数是一个语法结构,list可以作为表达式左值，很特殊的多重赋值
//而且list中变量取值是根据下标顺序，而不是加入顺序
$arr2 = array(3=>5,0=>15,1=>23,2=>5);
list($v1,$v2,$v3,$v4) = $arr2;
echo "v1=$v1,v2=$v2,v3=$v3,v4=$v4<br />";



//while each list 遍历数组
//each到最后是会返回false即结束循环
while(list($key,$value) = each($arr1))
{
	echo $key." : ".$value."<br />";
	
}

?>
</body>
</html>
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
<?php
//求123左移3位和右移3位值；
$v1 = 123;
$r1 = $v1 << 3;
$r2 = $v1 >> 3;
echo "r1 = $r1, r2 = $r2";
//实际上，左移n位就是连续乘n次的2
//右移n位就是连续除n次的2（每次都舍去小数部分）

/*
一个小球从空中掉下来，求如下问题：
a)如果已知小球掉落时高度为1000m，求其触地瞬间的速度；
b)如果已知小球落地瞬间的速度（1000m/s），求其掉落时的高度）
附自由落体公式：自由落体的速度规律：v=gt，自由落体的位移规律：h=gt^2/2。；（其中g是重力加速度，在地球上g≈9.8m/s2；v是速度，h高度，t是时间）
*/
echo '<hr />';
const G = 9.8;
$h = 1000;	//已知高度
$t = pow($h * 2 / G, 1/2);	//求得时间
$v = G * $t;	//求得触地速度
echo "v  = $v";


$n = 4;
echo '<hr />';

for($i = 1; $i <= $n; ++$i){	//确定要输出的行数（行号）
	for($k = 1; $k <= $i; ++$k){//确定一行要输出的个数
		echo "*";
	}
	echo "<br />";
}
echo '<br />';
for($i = 1; $i <= $n; ++$i){	//确定要输出的行数（行号）
	for($k = 1; $k <= 2*$i-1; ++$k){//确定一行要输出的个数
		echo "*";
	}
	echo "<br />";
}
echo '<br />';
for($i = 1; $i <= $n; ++$i){	//确定要输出的行数（行号）
	//先输出若干个空格：
	for($m = 1; $m <= $n-$i; ++$m){
		echo "&nbsp;";
	}
	for($k = 1; $k <= 2*$i-1; ++$k){//确定一行要输出的个数
		echo "*";
	}
	echo "<br />";
}

//E图案
echo '<br />';
for($i = 1; $i <= $n; ++$i){	//确定要输出的行数（行号）
	//先输出若干个空格：
	for($m = 1; $m <= $n-$i; ++$m){
		echo "&nbsp;";
	}
	for($k = 1; $k <= 2*$i-1; ++$k){//确定一行要输出的个数
		if($k == 1 || $k == 2*$i-1){//如果是第一个或最后一个
			echo "*";
		}
		else{
			echo "&nbsp;";
		}
	}
	echo "<br />";
}

//F图案
echo '<br />';
for($i = 1; $i <= $n; ++$i){	//确定要输出的行数（行号）
	//先输出若干个空格：
	for($m = 1; $m <= $n-$i; ++$m){
		echo "&nbsp;";
	}
	for($k = 1; $k <= 2*$i-1; ++$k){//确定一行要输出的个数
		if($i == $n){//最后一行的情形：
			echo "*";
		}
		else{
			if($k == 1 || $k == 2*$i-1){//如果是第一个或最后一个
				echo "*";
			}
			else{
				echo "&nbsp;";
			}
		}
	}
	echo "<br />";
}

//G图案：
echo '<br />';
for($i = 1; $i <= $n; ++$i){	//确定要输出的行数（行号）
	//先输出若干个空格：
	for($m = 1; $m <= $n-$i; ++$m){
		echo "&nbsp;";
	}
	for($k = 1; $k <= 2*$i-1; ++$k){//确定一行要输出的个数
		if($k == 1 || $k == 2*$i-1){//如果是第一个或最后一个
			echo "*";
		}
		else{
			echo "&nbsp;";
		}
	}
	echo "<br />";
}
for($i = $n-1; $i >= 1; --$i){	//确定要输出的行数（行号）
	//先输出若干个空格：
	for($m = 1; $m <= $n-$i; ++$m){
		echo "&nbsp;";
	}
	for($k = 1; $k <= 2*$i-1; ++$k){//确定一行要输出的个数
		if($k == 1 || $k == 2*$i-1){//如果是第一个或最后一个
			echo "*";
		}
		else{
			echo "&nbsp;";
		}
	}
	echo "<br />";
}

echo "<hr />";
/*
百钱百鸡问题：
已知：公鸡5元一只，母鸡3元一只，小鸡一元3只。
现用100元钱买了100只鸡，问：公鸡母鸡小鸡各几只？
——请考虑尽可能高效的方法。
*/
/*
	思路：
	如果有0只公鸡，0只母鸡，1只小鸡：数量是100吗？价钱是100吗？否！
	如果有0只公鸡，0只母鸡，2只小鸡：数量是100吗？价钱是100吗？否！
	如果有0只公鸡，0只母鸡，3只小鸡：数量是100吗？价钱是100吗？否！
	。。。。。。。。。。。。
	如果有0只公鸡，0只母鸡，100只小鸡：数量是100吗？价钱是100吗？否！
	如果有0只公鸡，1只母鸡，1只小鸡：数量是100吗？价钱是100吗？否！
	如果有0只公鸡，1只母鸡，2只小鸡：数量是100吗？价钱是100吗？否！
	。。。。。。。。。。。。
	如果有0只公鸡，1只母鸡，100只小鸡：数量是100吗？价钱是100吗？否！
	如果有0只公鸡，2只母鸡，1只小鸡：数量是100吗？价钱是100吗？否！
	。。。。。。。。。。。。
	。。。。。。。。。。。。。。。
	。。。。。。。。。。。。。。。。。。。。
	如果有100只公鸡，100只母鸡，0只小鸡：数量是100吗？价钱是100吗？否！
	如果有100只公鸡，100只母鸡，1只小鸡：数量是100吗？价钱是100吗？否！
	如果有100只公鸡，100只母鸡，2只小鸡：数量是100吗？价钱是100吗？否！
	。。。。。。。。。。。。。。。。。

	这就叫做：穷举思想：就是将所有可能的情况挨个去“测试一下”
*/
//方法1：原始思路
$count = 0;	//计算次数
for($gongji = 0; $gongji <= 100; ++$gongji){
	for($muji = 0; $muji <= 100; ++$muji){
		for($xiaoji = 0; $xiaoji <= 100; ++$xiaoji){
			if($gongji*5 + $muji*3 + $xiaoji/3== 100 && $gongji + $muji+$xiaoji==100){
				echo "<br />公鸡$gongji, 母鸡$muji, 小鸡$xiaoji";
			}
			$count++;	//计次
		}
	}
}
echo "<br />次数：$count";

echo "<p>优化2：";
$count = 0;	//计算次数
for($gongji = 0; $gongji <= 100; ++$gongji){
	for($muji = 0; $muji <= 100; ++$muji){
		$xiaoji = 100 - $gongji - $muji;	//根据已知条件，直接可得
		//for($xiaoji = 0; $xiaoji <= 100; ++$xiaoji){
			if($gongji*5 + $muji*3 + $xiaoji/3== 100 ){
				echo "<br />公鸡$gongji, 母鸡$muji, 小鸡$xiaoji";
			}
			$count++;	//计次
		//}
	}
}
echo "<br />次数：$count";

echo "<p>优化3：";
$count = 0;	//计算次数
for($gongji = 0; $gongji <= 100/5; ++$gongji){//考虑总价，则公鸡最多100/5只
	for($muji = 0; $muji <= 100/3; ++$muji){//考虑总价，则母鸡最多100/3只
		$xiaoji = 100 - $gongji - $muji;	//根据已知条件，直接可得
		//for($xiaoji = 0; $xiaoji <= 100; ++$xiaoji){
			if($gongji*5 + $muji*3 + $xiaoji/3== 100 ){
				echo "<br />公鸡$gongji, 母鸡$muji, 小鸡$xiaoji";
			}
			$count++;	//计次
		//}
	}
}
echo "<br />次数：$count";

echo "<p>优化4：";
$count = 0;	//计算次数
for($gongji = 0; $gongji <= 100/5; ++$gongji){//考虑总价，则公鸡最多100/5只
	for($muji = 0; $muji <= (100-$gongji*5)/3; ++$muji){//考虑总价和公鸡所化的钱，则母鸡最多100/3只
		$xiaoji = 100 - $gongji - $muji;	//根据已知条件，直接可得
		//for($xiaoji = 0; $xiaoji <= 100; ++$xiaoji){
			if($gongji*5 + $muji*3 + $xiaoji/3== 100 ){
				echo "<br />公鸡$gongji, 母鸡$muji, 小鸡$xiaoji";
			}
			$count++;	//计次
		//}
	}
}
echo "<br />次数：$count";

echo "<p>优化5：";
$count = 0;	//计算次数
for($gongji = 0; $gongji <= 100/5; ++$gongji){//考虑总价，则公鸡最多100/5只\
	for($muji = 0; $muji <= (100-$gongji*5)/3; ++$muji){//考虑总价和公鸡所化的钱，则母鸡最多100/3只
		$xiaoji = 100 - $gongji - $muji;	//根据已知条件，直接可得
		if($xiaoji % 3 != 0){continue;}		//考虑小鸡的价格，则数量只能是被3整除才合理
		//for($xiaoji = 0; $xiaoji <= 100; ++$xiaoji){
			if($gongji*5 + $muji*3 + $xiaoji/3== 100 ){
				echo "<br />公鸡$gongji, 母鸡$muji, 小鸡$xiaoji";
			}
			$count++;	//计次
		//}
	}
}
echo "<br />次数：$count";


echo "<p>优化6：";
$count = 0;	//计算次数
for($gongji = 0; $gongji <= 100/5; ++$gongji){//考虑总价，则公鸡最多100/5只\
	
	for($muji = 0; $muji <= (100-$gongji*5)/3; ++$muji){//考虑总价和公鸡所化的钱，则母鸡最多100/3只
		$xiaoji = 100 - $gongji - $muji;	//根据已知条件，直接可得
		if($xiaoji % 3 != 0){continue;}		//考虑小鸡的价格，则数量只能是被3整除才合理
		//for($xiaoji = 0; $xiaoji <= 100; ++$xiaoji){
			if($gongji*5 + $muji*3 + $xiaoji/3== 100 ){
				echo "<br />公鸡$gongji, 母鸡$muji, 小鸡$xiaoji";
			}
			$count++;	//计次
		}
	//}
}
echo "<br />次数：$count";
?>
</body>
</html>

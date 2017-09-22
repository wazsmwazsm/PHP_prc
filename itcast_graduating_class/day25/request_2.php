<?php

//PHP来模拟浏览器发送请求


$host = '192.168.1.56';

$port = '80';

//获得网络连接资源
$link = fsockopen($host, $port);

//请求行
define('CRLF', "\r\n");
$requset_data = 'POST /BiYeBan/PHP/day24/shop34_upload_img/index.php?p=back&c=Admin&a=check HTTP/1.1' . CRLF;

//请求头
$requset_data .= "Host: $host".CRLF;

//代理信息
$requset_data .= "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36".CRLF;

//改成close请求结束会立即断开连接 Keep-Alive会等待几秒
$requset_data .= "Connection: close".CRLF;



//post 请求特殊的头,描述请求主体
$post_data = array('username'=>'admin', 'password'=>'wzdanzsm', 'captcha'=>'HHHH');
//将上述变为username=admin&password=wzdanzsm&captcha=HHHH
//使用http_build_query();
$post_content = http_build_query($post_data);

$requset_data .= "Content_Length: ".strlen($post_content).CRLF;
$requset_data .= "Content_Type: application/x-www-form-urlencoded".CRLF;

//空行表示头结束
$requset_data .= CRLF;

//var_dump($requset_data);
//请求主体
$requset_data .= $post_content;//主体结束不用CRLF，因为已经告诉服务器主体长度了

//向服务器发送请求
//fwrite也能像网络资源写入
fwrite($link, $requset_data);

//获取处理相应数据
while(!feof($link)){
	//echo iconv('utf-8','gbk',fgets($link, 1024)); 服务器端GBK的话要转换一下编码防止乱码
	echo fgets($link, 1024);
}

//断开连接
fclose($link);













<?php

//PHP来模拟浏览器发送请求


$host = 'www.sina.com.cn';

$port = '80';

//获得网络连接资源
$link = fsockopen($host, $port);

//请求行
define('CRLF', "\r\n");
$requset_data = 'GET / HTTP/1.1' . CRLF;

//请求头
$requset_data .= "Host: $host".CRLF;

//代理信息
$requset_data .= "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36".CRLF;

//改成close请求结束会立即断开连接 Keep-Alive会等待几秒
$requset_data .= "Connection: close".CRLF;
//空行表示头结束
$requset_data .= CRLF;

//var_dump($requset_data);
//请求主体，GET没有主体

//向服务器发送请求
//fwrite也能像网络资源写入
fwrite($link, $requset_data);

//获取处理相应数据
while(!feof($link)){
	echo fgets($link, 1024);
}

//断开连接
fclose($link);


<?php

header('content-type:text/html;charset=utf-8');



//1、GET




//实际开发用CURL的多，简单方便
//初始化
// $curl = curl_init();

// $url = 'http://192.168.1.56/BiYeBan/PHP/day24/shop34_upload_img/index.php?p=back&c=Admin&a=login';
// //设置选项
// curl_setopt($curl, CURLOPT_URL, $url);

// //发出请求
// curl_exec($curl);

// //关闭资源
// curl_close($curl);




//2、POST




//初始化
// $curl = curl_init();

// $url = 'http://192.168.1.56/BiYeBan/PHP/day24/shop34_upload_img/index.php?p=back&c=Admin&a=check';
// //设置选项
// curl_setopt($curl, CURLOPT_URL, $url);
// //当前请求设置为post请求
// curl_setopt($curl, CURLOPT_POST, true);

// $post_data = array('username'=>'admin', 'password'=>'wzdanzsm', 'captcha'=>'HHHH');
// //设置post主体
// curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

// //发出请求
// curl_exec($curl);

// //关闭资源
// curl_close($curl);




//3、返回响应数据




//初始化
// $curl = curl_init();

// $url = 'http://192.168.1.56/BiYeBan/PHP/day24/shop34_upload_img/index.php?p=back&c=Admin&a=check';
// //设置选项
// curl_setopt($curl, CURLOPT_URL, $url);
// //当前请求设置为post请求
// curl_setopt($curl, CURLOPT_POST, true);

// $post_data = array('username'=>'admin', 'password'=>'wzdanzsm', 'captcha'=>'HHHH');
// //设置post主体
// curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
// //请求时不时将响应直接输出，而是以返回值的形式处理
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, $post_data);

// //发出请求
// $response_content = curl_exec($curl);

// echo $response_content;
// //echo iconv('utf-8', 'gbk', $response_content);
// //关闭资源
// curl_close($curl);




//4、POST UPLOAD 实现模拟文件上传




//初始化
// $curl = curl_init();

// $url = 'http://192.168.1.56/BiYeBan/PHP/day25/upload.php';
// //设置选项
// curl_setopt($curl, CURLOPT_URL, $url);
// //当前请求设置为post请求
// curl_setopt($curl, CURLOPT_POST, true);

// //加@让服务器知道是一个路径地址而不是单纯的字符串
// $post_data = array('logo'=>'@./upload.jpg');
// //设置post主体
// curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

// //发出请求
// curl_exec($curl);

// //关闭资源
// curl_close($curl);




//5、模拟会话 模拟cookie 模拟登陆



//跳过验证码，选择没有验证码的版本
//POST
//初始化 验证管理员信息，获取登录标志
$curl = curl_init();

$url = 'http://192.168.1.56/BiYeBan/PHP/day22/shop34_back_show/index.php?p=back&c=Admin&a=check';
//设置选项
curl_setopt($curl, CURLOPT_URL, $url);
//当前请求设置为post请求
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HEADER, true);

//设置记录cookie的保存位置
curl_setopt($curl, CURLOPT_COOKIEJAR, './cookie.txt');

$post_data = array('username'=>'admin', 'password'=>'wzdanzsm');
//设置post主体
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

//发出请求
curl_exec($curl);

//关闭资源
curl_close($curl);


//GET 请求后台首页

//初始化
$curl = curl_init();

$url = 'http://192.168.1.56/BiYeBan/PHP/day22/shop34_back_show/index.php?p=back&c=Manage&a=index';
//设置选项
curl_setopt($curl, CURLOPT_URL, $url);
//输出一些响应头信息
curl_setopt($curl, CURLOPT_HEADER, true);
//设置请求时携带的cookie数据
curl_setopt($curl, CURLOPT_COOKIEFILE, './cookie.txt');
//发出请求
curl_exec($curl);

//关闭资源
curl_close($curl);
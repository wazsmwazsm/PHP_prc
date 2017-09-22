<?php
// tip 有效期的设定是个时间间隔
header('Content-Type: text/html; charset=utf-8');

// session数据的持久性：1、修改sessionID的有效时间:session_set_cookie_params(3600);
//						2、修改session数据区:ini_set('session.dc_maxlifetime','3600');
session_set_cookie_params(600, '/', 'kang.com');

// var_dump($_SESSION);
session_start();
echo  '<PRE>';

var_dump($_SESSION);
 

//销毁：销毁session对应的数据区，并关闭session机制

session_destroy();


/* 完全销毁三部曲 */
//仍然可以看到session数组中的东西，因为销毁的
//是session数据区，但是session数组变量是存储在内存中的
var_dump($_SESSION);
//完全销毁
unset($_SESSION);
//PHPSESSID称作session.name，可以在php.ini中被配置
//效毁sessionID，发出cookie清除指令
//setcookie('PHPSESSID','',time()-1);
//更好的做法
setcookie(session_name(),'',time()-1);


//如何清空session数据？不要unset
$_SESSION = array();
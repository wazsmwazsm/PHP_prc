<?php

//配置
//修改session垃圾回收的概率
ini_set('session.gc_probability', 1);

ini_set('session.gc_divisor', 3);

//require './userSession.php';

//修改session设置,不仅仅使用cookie传sessionID
ini_set('session.use_only_cookies','0');
//自动传送sessionID，通过URL参数状态栏
//安全性太低，只适合内网使用
ini_set('session.use_trans_sid','1');

session_start();

$_SESSION['class_name'] = 'PHP34';
$_SESSION['student_name'] = 'Qin';
?>

<a href="./session_4.php">session_4</a>

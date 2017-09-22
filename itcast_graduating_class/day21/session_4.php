<?php


// require './userSession.php';

//修改session设置,不仅仅使用cookie传sessionID
ini_set('session.use_only_cookies','0');
//自动传sessionID
ini_set('session.use_trans_sid','1');

session_start();

//session_destroy();
var_dump($_SESSION);


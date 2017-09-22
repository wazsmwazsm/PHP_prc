<?php

//开启session
session_start();

//增删改查都是通过$_SESSION数组处理

$_SESSION['class_name'] = 'php34';

$_SESSION['teacher_name'] = 'qin';

unset($_SESSION['teacher_name']);

isset($_SESSION['class_name']);

var_dump($_SESSION['class_name']);
?>
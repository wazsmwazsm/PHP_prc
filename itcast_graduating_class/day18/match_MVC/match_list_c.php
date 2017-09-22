<?php
	//我是控制器controller
	//浏览器请求controller
	header('Content-type:text/html;charset=utf-8');

	//调用相应的处理文件 
	require './match_list_m.php';

	//载入显示文件
	require './template/match_list_v.html';
//建议全PHP文件时不要php结尾

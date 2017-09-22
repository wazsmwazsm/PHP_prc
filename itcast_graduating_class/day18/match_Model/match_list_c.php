<?php
	//我是控制器controller
	//浏览器请求controller
	header('Content-type:text/html;charset=utf-8');

	//实例化相应的模型对象，调用某个方法实现固定功能
	//require './MatchModel.class.php';
	//$m_match = new MatchModel();

	//通过工厂获得对象
	require './factory.class.php';
	$m_match = Factory::M('MatchModel');
	
	$match_list = $m_match->getList();

	//载入显示文件
	require './template/match_list_v.html';
//建议全PHP文件时不要php结尾

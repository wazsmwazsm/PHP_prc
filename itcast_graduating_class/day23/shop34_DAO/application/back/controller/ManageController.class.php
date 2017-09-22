<?php
//后台管理平台首页

class ManageController extends PlatformController{


	//首页动作
	public function indexAction(){
		
		//功能
		require CURRENT_VIEW_PATH.'index.html';
	}

	//top
	public function topAction(){
		require CURRENT_VIEW_PATH.'top.html';
	}

	//menu
	public function menuAction(){
		require CURRENT_VIEW_PATH.'menu.html';
	}


	//drag
	public function dragAction(){
		require CURRENT_VIEW_PATH.'drag.html';
	}

	//main
	public function mainAction(){
		require CURRENT_VIEW_PATH.'main.html';
	}


}
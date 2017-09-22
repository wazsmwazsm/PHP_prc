<?php

//平台控制器
//给每一个平台增加相应的基础操作，比如后台都需要登陆验证
//开启session等操作

class PlatformController extends Controller {

	//构造函数
	public function __construct(){
		//发生重写，要调用父类的构造函数
		parent::__construct();
		$this->_initSession();
		$this->_checkLogin();
	}
	//初始化session
	protected function _initSession(){
		//验证登陆标志
		new SessionDB;
	}
	//登陆验证
	protected function _checkLogin(){
		
		//列出不需要判断的动作列表，防止死循环
		//因为初始化的时候开始验证的话，login就会不断验证初始化
		//同时兼顾控制器和动作
		$no_list = array(
			'Admin' => array('login','check','captcha'),
			//控制器名 => 当前控制器不需要验证的动作列表
			);
		//可以执行到这里分发常量CONTROLLER和ACTION已经确定了,用这两个
		//常量来判断现在的控制器和动作是什么，从而监测这些动作是否需要验证
		if(isset($no_list[CONTROLLER]) && in_array(ACTION, $no_list[CONTROLLER])){
			//不需要验证，返回
			return;
		}
		if(!isset($_SESSION['admin'])){
			$this->_jump('index.php?p=back&c=Admin&a=login');
		}
	}
}
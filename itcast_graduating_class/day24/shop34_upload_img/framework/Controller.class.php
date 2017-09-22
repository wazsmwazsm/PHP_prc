<?php

//我是基础控制器，处理所有控制器需要的共有功能
class Controller {

	//构造方法里调用
	//在实例化控制器时设置编码
	public function __construct(){
		$this->__initContentType();
	}
	//初始化content-type
	protected function __initContentType(){

		header('Content-type:text/html;charset=utf-8');
	}

	//跳转方法,只有控制器内部使用
	/*
		@param $url 目标URL
		@param $info 提示信息
		@param $wait 等待时间
		@return void 


	*/
	protected function _jump($url, $info=NULL, $wait=3){
		if(is_null($info)){
			//立即跳转
			header('Location:'.$url);
		} else {
			//提示跳转
			header("Refresh: $wait; URL=$url");
			echo $info;
		}
		//终止程序
		die;
	}
} 
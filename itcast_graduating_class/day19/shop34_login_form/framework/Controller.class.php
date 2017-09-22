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

} 
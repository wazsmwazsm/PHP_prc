<?php
//后台管理平台首页

class ManageController extends Controller{


	//首页动作
	public function indexAction(){
		//验证登陆标志
		new SessionDB;
		
		if(!isset($_SESSION['is_login'])){
			$this->_jump('index.php?p=back&c=Admin&a=login');
		}

		echo "你好，这里是后台首页";
	}
}
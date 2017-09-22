<?php

//后台管理员相关操作类(登陆，退出，找回密码，增删改查等)

class AdminController extends Controller {

	//登陆表单动作
	public function loginAction(){
		//载入当前的视图层模板文件
		require CURRENT_VIEW_PATH.'login.html';

	}

	//验证管理员是否合法
	public function checkAction(){
		//获得表单数据
		$admin_name = $_POST['username'];
		$admin_pass = $_POST['password'];

		//通过数据库验证管理员信息是否存在
		$m_admin = Factory::M('AdminModel');
		if($m_admin->check($admin_name,$admin_pass)){
			//验证通过
			echo '合法，直接跳转后台首页';

		} else {
			echo '非法，跳转到后台登陆页面';
		}
	}
}

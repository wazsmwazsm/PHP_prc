<?php

//后台管理员相关操作类(登陆，退出，找回密码，增删改查等)

class AdminController extends PlatformController {

	//登陆表单动作
	public function loginAction(){
		//载入当前的视图层模板文件
		require CURRENT_VIEW_PATH.'login.html';

	}

	//验证管理员是否合法
	public function checkAction(){
		//验证验证码
		$t_captcha = new Captcha();

		if(! $t_captcha->checkCaptcha($_POST['captcha'])){
			//验证码错误
			$info = '验证码错误';
			$this->_jump('index.php?p=back&c=Admin&a=login',$info,2);
		}

		//获得表单数据
		$admin_name = $_POST['username'];
		$admin_pass = $_POST['password'];

		//通过数据库验证管理员信息是否存在
		$m_admin = Factory::M('AdminModel');

		
		if($m_admin->check($admin_name,$admin_pass)){
			//验证通过
			//登陆标志，session
			//因为继承类platform控制器，实例化时已经new了session对象，这里就不用开启了
			$_SESSION['is_login'] = 'yes';
			$this->_jump('index.php?p=back&c=Manage&a=index');

		} else {
			//验证失败
			$info = '管理员信息非法！'; 
			$this->_jump('index.php?p=back&c=Admin&a=login',$info);
		}
	}

	//生成管理员登陆页面验证码动作，被img标签的src所调用
	public function captchaAction(){
		//利用captcha工具类
		$t_captcha = new Captcha();
		//生成
		$t_captcha->generate();
	}


	//退出登录

	public function logoutAction(){
		unset($_SESSION['is_login']);
		$this->_jump('index.php?p=back&c=Admin&a=login');
	}
}

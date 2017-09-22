<?php

//验证码工具类

class Captcha {

	/*	
		输出生成的验证码
		$param $code_len = 4 码值的长度
		@return void
	*/
	public function generate($code_len = 4){
		//生成码值

		$chars = 'QWERTYUIPALSKDJFHGMBNVCXZ123456789'; //所有可能的码值
		$chars_len = strlen($chars);
		

		$code =''; //初始化码值字符串

		for($i=1; $i<=$code_len; $i++){
			$rand_index = mt_rand(0,$chars_len-1);
			$code .= $chars[$rand_index]; //字符串支持[]操作
		}

		//存储与session用于验证
		//为了保证session一定是开始的但是重复开启也不报错
		@ session_start();

		$_SESSION['captcha_code'] = $code;

		//生成验证码图片

		//背景图
		$bg_file = TOOL_PATH.'captcha/captcha_bg'.mt_rand(1,5).'.jpg';


		//创建画布

		$img = imageCreateFromJpeg($bg_file);

		//打印文字到画布上

		//分配文字颜色

		//随机的任意概率代码，用=><来实现
		// 4/5的概率显示黑色
		$str_color = mt_rand(1,5) < 4 ? imagecolorallocate($img, 0, 0, 0) : imagecolorallocate($img, 0xff, 0xff, 0xff);

		//写字符串,这个函数使用内置字体
		$font = 5;

		//画布大小
		$img_w = imagesx($img);
		$img_h = imagesy($img);

		//内置的字体大小
		$font_w = imagefontwidth($font);
		$font_h = imagefontheight($font);
		//字符串尺寸
		$code_w = $font_w * $code_len;
		$code_h = $font_h;

		//计算居中，为了文字长度更改还可以居中
		$x = ($img_w - $code_w) / 2;
		$y = ($img_h - $code_h) / 2;;
		imagestring($img, $font, $x, $y, $code, $str_color);

		//输出
		header('Content-type:image/jpeg;');
		imagejpeg($img);
		//销毁
		imagedestroy($img);

	}


	//验证
	//@param $request_code 用户表单中提交的验证码
	//@return bool

	public function checkCaptcha($request_code){

		@session_start();

		//存在且相等(strcasecmp不区分大小写)
		$result = isset($request_code) && isset($_SESSION['captcha_code']) && strcasecmp($request_code, $_SESSION['captcha_code']) == 0;

		//销毁session中的验证码值,防止被人拿去进行旧的session验证码匹配而忽略新生成的验证码
		//保证一时刻验证码是唯一的值
		unset($_SESSION['captcha_code']);
		
		return $result;
	}

}
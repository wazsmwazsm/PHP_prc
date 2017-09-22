<?php

//验证码工具类

class Captcha {

	/*	
		输出生成的验证码
		$param $code_len = 4 码值的长度
		@return void
	*/
	public function generate($code_len = 4){
		//创建图片
		$img_w = 145;
		$img_h = 45;
		$img = imagecreate($img_w, $img_h);

		//验证码长度:建议4-6位数
		$code_len = 6;
		//创建一个随机的背景颜色，画布填充颜色
		$bgColor = imagecolorallocate($img, rand(50,200), rand(0,155), rand(0,155));

		//字体颜色白色
		$fontColor = imagecolorallocate($img, 255, 255, 255);

		//字体大小
		$fontSize = 100 / $code_len;
		//字体获取
		define('FONT','/usr/share/fonts/truetype/');
		$fontStyle = FONT.'ubuntu-font-family/Ubuntu-BI.ttf';

		//产生随机字符
		for ($i=0; $i < $code_len ; $i++) { 
			// 48-57对应ascii表中的0~9,65-90对应大写字母,97-122为小写字母
			$randAscciiNumArray = array(rand(48,57),rand(65,90),rand(97,122));
			// 随机进行扫码，可能是数字、大写字母、小写字母
			$randAsciiNum = $randAscciiNumArray[rand(0,2)];
			// chr函数将ascii码转换为字符串
			$randStr = chr($randAsciiNum);
			//将随机产生的字符写入到画布,进行一些位置调整

			$angle = rand(0,20) - rand(0,25); //倾斜角度
			$font_x = 10+$i*(100/$code_len + 30/$code_len);
			$font_y = rand(100/$code_len + 2*$code_len,100/$code_len + 2*$code_len + 5);
			imagettftext($img, $fontSize, $angle, $font_x, $font_y, $fontColor, $fontStyle, $randStr);

			//构建验证码字符串
			$captcha_code .= $randStr;
		}

		//开启session，防止重复开启报错
		@ session_start();

		//写入session变量
		$_SESSION['captcha_code'] = $captcha_code;

		//干扰线
		$line_num = 8;
		for ($i=0; $i < $line_num; $i++) { 
			$lineColor = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));

			$line_x1 = rand(0,$img_w);
			$line_x2 = 0;
			$line_y1 = rand(0,$img_w);
			$line_y2 = $img_h;
			imageline($img, $line_x1, $line_x2, $line_y1, $line_y2, $lineColor);
		}


		//干扰点
		$pixel_num = 250;
		for ($i=0; $i < $pixel_num; $i++) { 
			$pixel_x = rand(0,$img_w);
			$pixel_y = rand(0,$img_h);
			imagesetpixel($img, $pixel_x, $pixel_y, $fontColor);
		}


		//输出
		header('Content-type:image/png;');
		imagepng($img);

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
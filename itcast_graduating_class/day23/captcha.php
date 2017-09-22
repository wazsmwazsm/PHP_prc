<?php



//生成码值

$chars = 'QWERTYUIPALSKDJFHGMBNVCXZ123456789'; //所有可能的码值
$chars_len = strlen($chars);
$code_len = 6; //码值长度

$code =''; //初始化码值字符串

for($i=1; $i<=$code_len; $i++){
	$rand_index = mt_rand(0,$chars_len-1);
	$code .= $chars[$rand_index]; //字符串支持[]操作
}

//echo $code;


//存储与session用于验证

session_start();

$_SESSION['captcha_code'] = $code;

//生成验证码图片

//背景图
$bg_file = './captcha/captcha_bg'.mt_rand(1,5).'.jpg';

//echo $bg_file;


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

	imagedestroy($img);





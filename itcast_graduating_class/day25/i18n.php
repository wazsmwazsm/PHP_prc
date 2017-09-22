<?php

header('content-type:text/html;charset=utf-8');

//准备好语言
$lang_list =  array('zh_CN','en_US','ja'); //支持的语言列表
$default_lang = 'zh_cn';

//$_SERVER['HTTP_ACCEPT_LANGUAGE'];

//找到浏览器需要的
$browser_lang  = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$browser_lang_list = explode(',',$browser_lang);

$accept_lang_list = array();
foreach ($browser_lang_list as $value) {
	$arr = explode(';', $value);
	$accept_lang_list[] = str_replace('-', '_', $arr[0]); // 只传名，不要权重

}
//var_dump($accept_lang_list);

//找到匹配的
//遍历浏览器可以接受，按照权重从前到后排列(注意：$_SERVER中的顺序代表了权重的大小排序)
foreach ($accept_lang_list as $value) {
	if(in_array($value, $lang_list)){
		$curr_lang = $value;
		break;
	}
}
if(!isset($curr_lang)){
	$curr_lang = $default_lang;
}

//载入语言包
require $curr_lang.'.lang.php';


echo $_LANG['HELLO'].' '. $_GET['name'];











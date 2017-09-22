<?php


header('content-type:text/html;charset=utf-8');


/*
	@param 目录地址
	@return bool 删除成功、失败
	递归删除
*/
function rmDirs($path){
	//如果文件不存在或者目录不存在就return
	if(!is_dir($path) || !file_exists($path)){
		return false;
	}
	$dir_handle = opendir($path);

	while(false !== $file = readdir($dir_handle)){
		if($file == '.' || $file == '..') continue;

		//判断当前是否为目录
		if(is_dir($path.'/'.$file)){
			$func_name = __FUNCTION__;
			$func_name($path.'/'.$file);
		} else{
			//删除文件
			unlink($path.'/'.$file);

		}
	}
	closedir($dir_handle);
	//删除目录
	return rmdir($path);
}
$path = '/var/www/BiYeBan/PHP/day24/shop34_2';

if(rmDirs($path)){
	echo '已删除';
}else{
	echo '删除失败';
}

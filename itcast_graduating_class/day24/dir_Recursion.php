<?php
header('content-type:text/html;charset=utf-8;');
/*
	@param 目录地址
	递归操作
*/
function readDirs($path){
	//如果文件不存在或者目录不存在就return
	if(!is_dir($path) || !file_exists($path)){
		return false;
	}

	$dir_handle = opendir($path);

	while(false !== $file = readdir($dir_handle)){
		if($file == '.' || $file == '..') continue;

		echo $file, "<br />";

		//判断当前是否为目录
		if(is_dir($path.'/'.$file)){
			readdirs($path.'/'.$file);
		}
	}
	closedir($dir_handle);
}

//$path = '/var/www/BiYeBan/PHP/day24';
//readDirs($path);


/*
	@param 目录地址
	@param $deep=0 递归深度
	递归操作
	树状缩进显示
*/
function readDirsTree($path, $deep=0){
	//如果文件不存在或者目录不存在就return
	if(!is_dir($path) || !file_exists($path)){
		return false;
	}

	$dir_handle = opendir($path);

	while(false !== $file = readdir($dir_handle)){
		if($file == '.' || $file == '..') continue;

		//str_repeat重复字符串
		echo str_repeat('&nbsp', $deep*4).'- '.$file, "<br />";

		//判断当前是否为目录
		if(is_dir($path.'/'.$file)){
			$func_name = __FUNCTION__;
			$func_name($path.'/'.$file, $deep + 1); // 可变函数,写deep+1不改变deep值，deep++会变
		}
	}
	closedir($dir_handle);
}

//$path = '/var/www/BiYeBan/PHP/day24';
//readDirsTree($path);


//嵌套结构
/*
array(
	array('filename' = > 'index.php', 'type' => 'file'),
	array('filename' = > 'application', 'type' => 'dir', 'nested' => array(
			array('filename' = > '.htaccess', 'type' => 'file',),
			array('filename' = > 'back', 'type' => 'dir', 'nested' => array()),
		)),
	);

/*


/*
	@param 目录地址
	@param $deep=0 递归深度
	@return 成功：array嵌套数组 失败：bool false
	递归操作
	嵌套显示
*/
function readDirsNested($path){
	//如果文件不存在或者目录不存在就return
	if(!is_dir($path) || !file_exists($path)){
		return false;
	}

	$nested = array(); //存储当前目录下所有的文件

	$dir_handle = opendir($path);

	while(false !== $file = readdir($dir_handle)){
		if($file == '.' || $file == '..') continue;

		//创建当前文件信息
		$fileInfo = array();
		//将文件名中的中文编码转换:linux服务器是utf-8编码，所以其实不用转换
		//windows: $fileInfo['name'] = iconv('gbk', 'utf-8', $file);
		$fileInfo['name'] = iconv('utf-8', 'utf-8', $file);
		
		//判断当前是否为目录
		if(is_dir($path.'/'.$file)){
			//是目录
			$fileInfo['type'] = 'dir';
			$func_name = __FUNCTION__;
			//是目录，就增加一个存储嵌套信息的属性
			$fileInfo['nested'] = $func_name($path.'/'.$file); 
		}else{
			//是文件
			$fileInfo['type'] = 'file';
		}
		//把当前文件信息存储到nested中
		$nested[] = $fileInfo;
	}

	closedir($dir_handle);
	return $nested;
}

$path = '/var/www/BiYeBan/PHP/day24/';
$list = readDirsNested($path);
echo "<pre>";
//print_r($list);

foreach ($list as $first) {
	//显示第一层
	echo $first['name'], '<br>';
	if($first['type'] == 'file') continue;
	//想显示第二层的话
	foreach ($first['nested'] as $second) {
		echo '&nbsp;',$second['name'],'<br>';
	}
}
//代码中的地址存在中文,如果系统是GBK，那么要转换
//我这里是linux所以不用转换
//windows：var_dump(file_exists(iconv('utf-8', 'gbk', $path)));
$path = '/var/www/BiYeBan/PHP/day24/好吃';
var_dump(file_exists(iconv('utf-8', 'utf-8', $path)));

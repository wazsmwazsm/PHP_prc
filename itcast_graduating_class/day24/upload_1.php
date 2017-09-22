<?php
header('content-type:text/html;charset=utf8');
/* 上传函数 
	@param $tmp_file 关联数组，5个元素，临时上传文件的信息
	@return 成功：string上传到服务器的文件名。失败：false
*/
/*echo "<pre>";
var_dump($_FILES);
die;*/

function upload($tmp_file){
	// 是否存在错误
	if($tmp_file['error'] != 0){
		echo '文件上传错误';
		return false;
	}

	// 尺寸判断
	$max_size = 1024*1024*2; // 最大尺寸2M左右

	if($tmp_file['size'] > $max_size){
		echo '文件过大';
		return false;
	}

	//类型判断,
	//设置一个后缀名与mine的映射关系
	//用后缀名来算出mime类型
	$type_map = array(
		'.png' => array('image/png','image/x-png'),
		'.jpg' => array('image/jpeg','image/pjpeg'),
		'.jpeg' => array('image/jpeg','image/pjpeg'),
		'.gif' => array('image/gif'),
		);
	//后缀，从原始文件中提取
	$allow_ext = array('.png','.gif','.jpg','.jpeg');
	//防止大写的扩展名
	$ext = strtolower(strrchr($tmp_file['name'],'.'));

	if(!in_array($ext, $allow_ext)){
		echo "类型不合法";
		return false;
	}
 
	//MIME
	//$allow_mime_list = array('image/png','image/gif','image/jpeg','image/pjpeg','image/x-png');

	$allow_mime_list = array();

	foreach ($allow_ext as $value) {
		//得到每个后缀名
		//array_merge合并数组
		$allow_mime_list = array_merge($allow_mime_list, $type_map[$value]);

	}
	//去重复,去掉数组中重复的值
	array_unique($allow_mime_list);
	
	if(!in_array($tmp_file['type'], $allow_mime_list)){
		echo "类型不合法";
		return false;
	}


	//PHP自己获取文件的mime类型去检测,比浏览器提供的更加安全可靠
	//获得的绝对真实的文件类型
	$finfo  = new finfo(FILEINFO_MIME_TYPE); //获取一个可以检测文件信息的对象

	$mime_type = $finfo->file($tmp_file['tmp_name']);

	if(!in_array($mime_type, $allow_mime_list)){
			echo "类型不合法";
			return false;
		}

	//移动
	//上传文件存储地址
	$upload_path = './';

	//创建子目录
	$sub_dir = date('YmdH').'/';

	//检测目录存在
	if(!is_dir($upload_path.$sub_dir)){
		//不存在,创建
		mkdir($upload_path.$sub_dir);
	}



	//科学起名
	$prefix = 'test_';
	$upload_filename = uniqid($prefix,true) . $ext;


	if(move_uploaded_file($tmp_file['tmp_name'], $upload_path.$sub_dir.$upload_filename)){
		//移动成功
		return $sub_dir.$upload_filename;
	} else {
		//移动失败
		echo "移动失败";
		return false;
	}
}

//$result = upload($_FILES['test']);
//var_dump($result);


//多文件上传
function uploadList($tmp_file_list){

	//遍历,重点在于取得键值
	foreach ($tmp_file_list['error'] as $key => $value) {
		$tmp_file = array();
		//利用key获取所有的属性
		$tmp_file['name'] = $tmp_file_list['name'][$key];
		$tmp_file['type'] = $tmp_file_list['type'][$key];
		$tmp_file['tmp_name'] = $tmp_file_list['tmp_name'][$key];
		$tmp_file['error'] = $tmp_file_list['error'][$key];
		$tmp_file['size'] = $tmp_file_list['size'][$key];
		//山传
		upload($tmp_file);
	}

}
uploadList($_FILES['pic']);


/*
echo "<pre>";
var_dump($_POST);
var_dump($_FILES);
echo system ('ls /home/mrq/temp');

move_uploaded_file($_FILES['test']['tmp_name'], './upload.jpg');
*/
?>





<?php


//上传工具类

class Upload {

	//可配置的属性
	private $_max_size;
	private $_type_map;
	private $_allow_ext_list;
	private $_allow_mime_list;
	private $_upload_path;
	private $_prefix;

	//错误信息
	private $_error;
	public function getError(){
		return $this->_error;
	}


	//构造方法
	public function __construct(){
		// 尺寸判断
		$this->_max_size = 1024*1024*2;
		//设置一个后缀名与mine的映射关系
		$this->_type_map = array(
			'.png' => array('image/png','image/x-png'),
			'.jpg' => array('image/jpeg','image/pjpeg'),
			'.jpeg' => array('image/jpeg','image/pjpeg'),
			'.gif' => array('image/gif'),
			);
		//后缀，从原始文件中提取
		$this->_allow_ext_list = array('.png','.gif','.jpg','.jpeg');
		//用后缀名来算出mime类型
		$allow_mime_list = array();

		foreach ($this->_allow_ext_list as $value) {
			//得到每个后缀名
			//array_merge合并数组
			$allow_mime_list = array_merge($allow_mime_list, $this->_type_map[$value]);

		};
		//去重复
		$this->_allow_mime_list = array_unique($allow_mime_list);

		//上传路径
		$this->_upload_path = './';
		$this->_prefix = 'logo_';

	}

	//上传单个文件
	public function uploadOne($tmp_file){
		// 是否存在错误
		if($tmp_file['error'] != 0){
			$this->_error = '文件上传错误';
			return false;
		}

		if($tmp_file['size'] > $this->_max_size){
			$this->_error =  '文件过大';
			return false;
		}
			
		//防止大写的扩展名
		$ext = strtolower(strrchr($tmp_file['name'],'.'));

		//ext
		if(!in_array($ext, $this->_allow_ext_list)){
			$this->_error = "类型不合法";
			return false;
		}
	 
		//MIME
		if(!in_array($tmp_file['type'], $this->_allow_mime_list)){
			$this->_error = "类型不合法";
			return false;
		}

		//PHP自己获取文件的mime类型去检测,比浏览器提供的更加安全可靠
		//获得的绝对真实的文件类型
		$finfo  = new finfo(FILEINFO_MIME_TYPE); //获取一个可以检测文件信息的对象

		$mime_type = $finfo->file($tmp_file['tmp_name']);

		if(!in_array($mime_type, $this->_allow_mime_list)){
				$this->_error =  "类型不合法";
				return false;
			}

		//移动
		//创建子目录
		$sub_dir = date('YmdH').'/';

		//检测目录存在
		if(!is_dir($this->_upload_path.$sub_dir)){
			//不存在,创建
			mkdir($this->_upload_path.$sub_dir);
		}

		$upload_filename = uniqid($this->_prefix, ture) . $ext;


		if(move_uploaded_file($tmp_file['tmp_name'], $this->_upload_path.$sub_dir.$upload_filename)){
			//移动成功
			return $sub_dir.$upload_filename;
		} else {
			//移动失败
			$this->_error =  "移动失败";
			return false;
		}

	}

	//强行访问不可访问的属性时调用
	public function __set($p, $v){
		$allow_set_list = array('_upload_path','_prefix','_allow_ext_list','_max_size');

		//可以不加:_ 设置
		if(substr($p, 0, 1) !== '_'){
			$p = '_'.$p;
		}

		if(!in_array($p, $allow_set_list)){
			//不在可设置的范围中，返回
			return false;
		}
		
		$this->$p = $v;
	}

}
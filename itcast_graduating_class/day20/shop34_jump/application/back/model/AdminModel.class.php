<?php

//admin表操作模型
class AdminModel extends Model{

	/*
		验证管理员是否合法
		@param $admin_name
		@param $admin_pass

		@return bool 
	*/
		public function check($admin_name,$admin_pass){
			//注意改一下mysql配置信息
			$sql = "select * from `p34_admin` 
					where admin_name = '$admin_name' 
					and admin_pass = md5('$admin_pass')";
			$row = $this->_dao->getRow($sql);

			//如果没有结果的话返回一个bool类型
			return (bool) $row;
		}

}












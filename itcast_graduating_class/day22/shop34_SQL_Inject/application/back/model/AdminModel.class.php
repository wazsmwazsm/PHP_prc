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
			//如果输入' or 1 or '会被SQL注入,建议所有接受的值都加单引号
			//使用addslashes函数可以转义特殊字符，但是更推荐MYSQL提供的
			//函数mysql_real_escape_string函数
			//进行字符转义
			$admin_name_escape = $this->_dao->escapeString($admin_name);
			$admin_pass_escape = $this->_dao->escapeString($admin_pass);

			//去掉单引号，因为在mysqlDB类中已经强制加上了  
			$sql = "select * from `p34_admin` 
					where admin_name = $admin_name_escape 
					and admin_pass = md5($admin_pass_escape)";
			
			$row = $this->_dao->getRow($sql);

			//如果没有结果的话返回一个bool类型
			return (bool) $row;
		}

}












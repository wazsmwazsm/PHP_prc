<?php

//定义一个类，统一处理用到DAO的模型

class DAO{

	protected function _checkDB(){
		switch ($GLOBALS['config']['app']['dao']){
			case 'mysql':
					$dao_class = 'MySQLDB';
					break;
			case 'pdo':
					$dao_class = 'PDODB';
					break;
			default:
					break;
		}
		return $dao_class;
	}


}



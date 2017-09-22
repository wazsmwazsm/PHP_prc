<?php

//针对一个模型对一个表可能操作多次而节省资源
//工厂类，用来生产单例化的模型类
//代替类似mysqlDB中的三私一共的单例模式
//可以为多个类提供单利模式
//而不必为所有需要单例的模型全部写成单例
//没有从根本上解决单例，因为程序员还可以使用new, 但是能针对多个模型，
//设计人员也要记住不要使用new来获得对象,要写一个说明书说明用法

class Factory{

	//生产模型的单例对象
	// @param $model_name string
	// @retrun object
	public static function M($model_name){
		//存储已经实例化好的模型对象列表
		static $model_list = array();
		//判断当前模型是否已经实例化
		if(!isset($model_list[$model_name])){
			//没实例化过
			require './application/'.PLATFORM.'/model/'.$model_name.'.class.php';
			$model_list[$model_name] =  new $model_name;
		}
		return $model_list[$model_name];
	}

}










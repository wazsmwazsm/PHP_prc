<?php


//比赛操作相关控制器功能类
require './Controller.class.php';

class MatchController extends Controller{
	//比赛列表操作 
	public function listAction(){
		
		//实例化相应的模型对象，调用某个方法实现固定功能
		//require './MatchModel.class.php';
		//$m_match = new MatchModel();

		//通过工厂获得对象
		require './factory.class.php';
		$m_match = Factory::M('MatchModel');
		
		$match_list = $m_match->getList();

		//载入显示文件
		require './template/match_list_v.html';
	}

	public function removeAction(){
		echo "比赛控制器的删除动作被执行";
	}
}


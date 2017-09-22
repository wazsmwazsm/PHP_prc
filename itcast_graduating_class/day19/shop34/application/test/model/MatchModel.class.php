<?php
//我是一个match表的模型model类
//模型层将每个表都做出单独的操作模型
//模型在项目中通常指的是对象而不是类本身

//可能会被多个模块加载，所以仅载入一次
require_once './framework/Model.class.php';
class MatchModel extends Model{

	//获得比赛列表
	public function getList(){

		//获得比赛列表书数据
		$sql = " SELECT t1.t_name as t1_name, m.t1_score, m.t2_score, t2.t_name as t2_name, m.m_time  from `match` as m LEFT JOIN `team` as t1 
		on m.t1_id = t1.t_id LEFT JOIN 	`team` as t2 on m.t2_id = t2.t_id";

		return $this->_dao->getAll($sql);
	}

	public function removeMatch($m_id){
		$sql = "delete from `match` where m_id = $m_id";
		return $this->_dao->query($sql);
	}
}



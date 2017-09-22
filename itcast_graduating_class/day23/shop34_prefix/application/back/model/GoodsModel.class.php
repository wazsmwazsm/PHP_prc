<?php

class GoodsModel extends Model {

	//逻辑表名
	protected $_logic_table = 'goods';

	//插入商品
	//@param $data array 关联数组字段
	//@return bool

	public function insertGoods($data){
		//先做数据校验
		if($data['goods_name'] == '' || $data['shop_price'] == 0){
			return false;
		}
		$data['create_admin_id'] = $_SESSION['admin']['admin_id'];
		//插入到数据库goods表
		//保证数据转义后插入，防止SQL注入
		$escape_data = $this->_escapeStringAll($data);
		//$sql = "INSERT INTO `p34_goods` VALUES (null,'$data['goods_name']')";
		$sql = sprintf("INSERT INTO $this->_table VALUES (null,%s,%s,'','',%s,%s,%s,%s,%s)", 
			$escape_data['goods_name'],$escape_data['shop_price'],$escape_data['goods_desc'],
			$escape_data['goods_number'],$escape_data['is_on_sale'],$escape_data['goods_promote'],
			$escape_data['create_admin_id']);
		
		//返回执行结果
		return $this->_dao->query($sql);
	}
}







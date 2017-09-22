<?php




//后台商品相关操作控制器类

class GoodsController extends PlatformController {

	// 商品添加表单

	public function addAction(){
		require CURRENT_VIEW_PATH . 'goods_add.html';
	}

	// 商品的插入
	public function insertAction(){
		//收集表单数据
		
		$data['goods_name'] = $_POST['goods_name'];
		$data['shop_price'] = $_POST['shop_price'];
		$data['goods_desc'] = $_POST['goods_desc'];
		$data['goods_number'] = $_POST['goods_number'];

		//上架处理
		//checkbox 未选中的话不会post传值，所以要做判断
		$data['is_on_sale'] = isset($_POST['is_on_sale']) ? '1' : '0';

		//推荐属性
		//合成一个要插入到数据库的set集合字符串
		//implode把数组集合成字符串，explode把字符串打散成数组
		$data['goods_promote'] = isset($_POST['goods_promote']) ? implode(',', $_POST['goods_promote']) : '';
		
		//上传表单原图
		$t_upload = new Upload();
		$t_upload->upload_path = './web/upload/';
		$t_upload->prefix = 'goods_ori_';
		if($result = $t_upload->uploadOne($_FILES['image_ori'])){
			//上传成功
			$data['goods_image_ori'] = $result;
		} else {
			//上传失败
			$this->_jump('index.php?p=back&c=Goods&a=add','上传失败:<br>'.$t_upload->getError());
		}

		
		//通过模型插入到数据
		$m_goods = Factory::M('GoodsModel');

		//根据插入结果，给出提示，并展示
		if($m_goods->insertGoods($data)){
			//成功，跳转到商品列表
			$this->_jump('index.php?p=back&c=Goods&a=list');

		} else {
			//失败，给出错误提示，返回到add添加动作
			$this->_jump('index.php?p=back&c=Goods&a=add','添加失败:<br>'.$m_goods->getError());

		}

	}

	//商品列表
	public function listAction(){
		echo "插入成功";


	}

}
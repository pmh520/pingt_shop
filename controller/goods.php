<?php
/**
* 商品的类
*/
class Goods extends baseControl
{
	// 商品列表行为
	public function index()
	{
		
		// 查询商品列表
		
		$lists = $this->model("goods")->select("sp_goods");
		// $admin = $this->model("admin")->select("sp_admin");

		// 在vue的data属性定义模型
		$this->assign("goods_list",$lists);
		// $this->assign("admin_list",$admin);
		// 数据库操作
		// ?1纯html
		$this->display();
	}

	// 添加行为
	public function add()
	{ 
		$this->assign("goods_category",[232,232,323,23]);

		// 数据库操作
		 $this->display();
		
	}

	public function del()
	{
		
	}
	
}

?>
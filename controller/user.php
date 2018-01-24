<?php

/**
* 	用户控制器		
*/
class User extends baseControl
{

	public function register()
	{
		// 获取数据
		print_r($_POST);
		// 存入数据库
		if ($_POST) {
			$add_data = [
				'user_name'=>$_POST['user_name'],
				'user_pwd'=>$_POST['user_pwd'],
			];

			$this->model("user")->insert($add_data);	
		}else{
			$this->display();
		}
	}
}
?>
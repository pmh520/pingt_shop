<?php

/**
* 父类控制器
*/
class baseControl 
{
	protected static $control_name; //控制器的名称
	protected static $action_name; //行为的名称
	private $smarty; //smarty对象，可以帮我在html中写动态语言的模版引擎

	function __construct()
	{
		 $this->smarty = new Smarty();
		 // 告诉视图层
		 $this->smarty->template_dir = "views";
	}

	// 静态的方法必须要用静态的属性
	public static function run()
	{
		// 获取用户去哪个控制器
		self::$control_name = isset($_REQUEST['control'])?$_REQUEST['control']:'goods';
		self::$action_name = isset($_REQUEST['action'])?$_REQUEST['action']:'index';

		// 规律：规范，控制器文件名称必须要和类同名
		
		$control_name = self::$control_name;
		$action_name = self::$action_name;

		// 判断文件到底存不存在
		if (!file_exists("controller/$control_name.php")) {
			exit("控制器: $control_name 不存在");
		} 
		include "controller/$control_name.php";
		$object = new $control_name();

		if(!method_exists($object, $action_name)){
			exit("方法: $action_name 不存在");
		}
		$object->$action_name();
	}

	public function assign($var,$value)
	{
		$this->smarty->assign($var,$value);
	}
	public function display()
	{
		
		$this->smarty->display(self::$control_name.'/'.self::$action_name.".html");
	}

	// 实例化模型层
	public function model($model_name)
	{
		$model = $model_name.'Model';
		include "model/$model.php";
		return new $model();
	}
}

?>
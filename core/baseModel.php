<?php

class baseModel {
	// 属性
	private $link;
	private $debug=true;//调试是否开启
	private $where_sql = ""; 
	protected $table_name = "";

	// 方法
	// 数据库连接，每一个操作都要执行连接
	function __construct($value='')
	{
		$this->link = new PDO("mysql:dbhost=localhost;dbname=pintuan_shop;charset=utf8","root");
		
		if ($this->debug) {
			$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}

	public function table()
	{
		return 'sp_'.$this->table_name;
	}
	// 方法可以操作这个种类的所有情况
	// 给表添加信息的种类
	
	/**
	 * 添加的方法
	 * @param  array  $add_data   要添加的数组信息
	 * @return [type]             [description]
	 */
	public function insert($add_data=[])
	{
		$table_name = $this->table();


		$cols =  $this->getCols($add_data);
		$values= $this->getValues($add_data);
		
		$this->query("insert into $table_name ($cols) values($values)");
	}

	public function query($sql)
	{
		try {
			$this->link->query($sql);
		} catch (PDOException $e) {
			echo '错误的sql语句是:'.$sql;
			echo '<br><br>错误提示:'.$e->errorInfo[2];
			// print_r($e);
		}
		
	}

	/**
	 * 获取列（自动）
	 * @param  array $add_data 数据数组
	 * @return string           列的结构
	 */
	private function getCols($add_data)
	{
		$cols_arra = array_keys($add_data);//['goods_name','goods_thumb']
		return implode(",", $cols_arra);
	} 

	private function getValues($add_data)
	{
		$valu_arr = array_values($add_data);
		foreach ($valu_arr as  $key=>$value) {
			if (is_string($value)) {
				$valu_arr[$key] = "'".$value."'";//替换字符串的值为两边有单引号
			}
		}
		return implode(",", $valu_arr);
	}

	private function getWhereStr($where_data)
	{
		$where_str = "";
		$lianjie_str = "";
		if (!empty($where_data)) {
			 foreach ($where_data as $key => $value) {
				// \'\'
				$where_str.=$lianjie_str." $key='".addslashes($value)."' ";
				$lianjie_str = " and ";
			}
		}
		
		if (!empty($where_str)) {
			$where_str = " where " .$where_str;
		}
		return $where_str;
	}
	/**
	 * 删除
	 * @param  string $table_name 表名
	 * @param  array  $where_data 删除的条件数组 例如：["id"=>1]
	 * @return [type]             [description]
	 */
	public function delete($table_name,$where_data=[])
	{
		// delete from 表名 where 条件1=值1 and 条件2='字符串值2'
		
		if (!empty($where_data)) {
			$this->where_sql = $this->getWhereStr($where_data);
		}
		if (!empty($this->where_sql)) {
			$this->query("delete from  $table_name  ".$this->where_sql);
		}
	}
	public function getError()
	{
		# code...
	}

	public function where($sql_str)
	{
		$this->where_sql = "where ".$sql_str;
		return $this;
	}

	public function update($table_name,$update_data)
	{
		$set_str = $this->getWhereStr($update_data);
		$this->query("update $table_name set $set_str  ".$this->where_sql);
	}

	public function select($table_name,$where_data="")
	{
		// 1/预处理
		$pdoStatement =  $this->link->prepare("select * from $table_name  ".$this->getWhereStr($where_data));

		// 2/执行
		$pdoStatement->execute();

		// 3/获取信息
		return $pdoStatement->fetchAll();
	}
}


?>
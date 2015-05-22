<?php
class Path
{
	public $adminName = "";
	public $weight = 0;
	public $access = null;
	public $search = "";
	public $data = "";
	public $seo = "";
	
	public static $table_name = "path";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "adminName", "column" => "adminName", "type" => "string", "readonly" => false),
		array("property" => "weight", "column" => "weight", "type" => "integer", "readonly" => false),
		array("property" => "access", "column" => "accessId", "type" => "Access", "readonly" => false),
		array("property" => "search", "column" => "search", "type" => "string", "readonly" => false),
		array("property" => "data", "column" => "data", "type" => "string", "readonly" => false),
		array("property" => "seo", "column" => "seo", "type" => "string", "readonly" => false)
	);
		
	function Path($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this); 
	}
	
	public function save() { 
		DB::save($this);
	}
	
	public function delete() { 
		DB::delete($this);
	}

}

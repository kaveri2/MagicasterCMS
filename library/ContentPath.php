<?php
class ContentPath
{
	public $weight = 0;
	public $access = null;
	public $path = "";
	public $prefixOrComplete = false;
	public $data = "";
	
	public static $table_name = "contentPath";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "weight", "column" => "weight", "type" => "integer", "readonly" => false),
		array("property" => "access", "column" => "accessId", "type" => "Access", "readonly" => false),
		array("property" => "path", "column" => "path", "type" => "string", "readonly" => false),
		array("property" => "prefixOrComplete", "column" => "prefixOrComplete", "type" => "boolean", "readonly" => false),
		array("property" => "data", "column" => "data", "type" => "string", "readonly" => false)
	);
		
	function ContentPath($id = 0) {
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
<?php

class AccessRule
{
	public $id 					= 0;
	public $adminName			= "";
	public $access				= NULL;	
	
	public static $table_name 	= "accessRule";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "adminName",  "column" => "adminName", "type" => "string", "readonly" => false),
		array("property" => "access",  "column" => "accessId", "type" => "Access", "readonly" => false)
	);
		
	function AccessRule($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this); 
	}
	
	public function save() { 
		DB::save($this);
	}
	
	public function delete() { 
		return DB::delete($this);
	}
}
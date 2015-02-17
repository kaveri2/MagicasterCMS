<?php

class Magicast
{
	//Values
	public $id 			= 0;
	public $adminName	= "";
	public $data		= "";
	public $public		= false;	
	
	//Objects
	
	//Table	
	public static $table_name = "magicast";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "adminName",  "column" => "adminName", "type" => "string", "readonly" => false),
		array("property" => "data", "column" => "data", "type" => "string", "readonly" => false),
		array("property" => "public", "column" => "public", "type" => "boolean", "readonly" => false)
	);
	
	function Magicast($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this);
	}
	
	public function save() {
		DB::save($this);
	}		
}
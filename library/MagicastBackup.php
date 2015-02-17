<?php

class MagicastBackup
{
	public $id 			= 0;
	public $magicast	= NULL;
	public $adminName	= "";
	public $data		= "";	
	public $public		= false;	
	public $stamp		= "";	
	
	public static $table_name = "magicastBackup";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "magicast",  "column" => "magicastId", "type" => "Magicast", "readonly" => false),
		array("property" => "adminName",  "column" => "adminName", "type" => "string", "readonly" => false),
		array("property" => "data", "column" => "data", "type" => "string", "readonly" => false),
		array("property" => "public", "column" => "public", "type" => "boolean", "readonly" => false),
		array("property" => "stamp", "column" => "stamp", "type" => "string", "readonly" => true)
	);
	
	function MagicastBackup($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this);
	}
	
	public function save() {
		DB::save($this);
	}
}

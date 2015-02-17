<?php

class AccessTimer
{
	//Values
	public $id 					= 0;
	public $adminName			= "";
	public $dateTime			= "";
	public $grantOrDeny			= 0;
	
	//Objects
	public $requireAccess		= NULL;
	public $provideAccess		= NULL;
	
	//Table
	public static $table_name 	= "accessTimer";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "adminName",  "column" => "adminName", "type" => "string", "readonly" => false),
		array("property" => "dateTime",  "column" => "windowEnd", "type" => "string", "readonly" => false),
		array("property" => "requireAccess",  "column" => "requireAccessId", "type" => "Access", "readonly" => false),
		array("property" => "provideAccess",  "column" => "provideAccessId", "type" => "Access", "readonly" => false),
		array("property" => "grantOrDeny",  "column" => "grantOrDeny", "type" => "boolean", "readonly" => false)
	);
		
	function AccessTimerStatic($id = 0) {
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
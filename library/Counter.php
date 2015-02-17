<?php

class Counter
{
	//Values
	public $id = "";
	public $client = null;
	public $value = 0;
	
	//Table
	public static $table_name = "counter";	
	public static $table_id_type = "string";
	public static $table_columns = array(
		array("property" => "client",  "column" => "clientId", "type" => "Client", "readonly" => false),
		array("property" => "value",  "column" => "value", "type" => "integer", "readonly" => false)
	);	
	
	function Counter($id = "") {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this);
	}
	
	public function save() {
		DB::save($this);
	}		
	
	public function add() {
		$q = "INSERT INTO " . DB::getTableName($this) . " (id, clientId, value) values (\"" . $this->id . "\", " . ($this->client ? $this->client->id : "NULL") . ", 1) ON DUPLICATE KEY UPDATE value = value + 1";
		$r = DB::mysql_query($q);
	}
}
<?php

class Client
{
	public $name = "";
	
	public static $table_name = "client";	
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "name",  "column" => "name", "type" => "string", "readonly" => false)
	);	
	
	function Client($id = "") {
		$this->id = $id;
	}

	public function load() {
		DB::load($this);
	}

	public function loadUsingName() {
		$name = DB::mysql_real_escape_string($this->name);
		$sql = "SELECT * FROM " . DB::getTableName($this) . " WHERE name='$name'";
		$result = DB::mysql_query($sql);
		$row = mysql_fetch_object($result);
		if ($row) {
			DB::load($this, $row);
		}
	}
	
	public function save() {
		DB::save($this);
	}

	public function addAccess($access) {
		$sql = "INSERT INTO " . DB::$table_prefix . "clientAccess (clientId, accessId) VALUES (" . $this->id . ", " . $access->id . ")";
		$result = DB::mysql_query($sql);
	}

	public function removeAccess($access) {
		$sql = "DELETE FROM " . DB::$table_prefix . "clientAccess WHERE clientId=" . $this->id . " AND accessId=" . $access->id;
		$result = DB::mysql_query($sql);
	}

	public function calculateAccessCache() {
		$a = array();
		$sql = "SELECT accessId FROM " . DB::$table_prefix . "clientAccess WHERE clientId=" . $this->id;
		$result = DB::mysql_query($sql);
		if ($result) while ($row = mysql_fetch_object($result)) {
			$a[$row->accessId] = null;
		}
		return $a;
	}

}

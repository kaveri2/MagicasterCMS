<?php

class Session
{
	public $id = 0;
	public $client = null;
	public $key = "";
	public $secret = "";
	public $ip = "";
	public $userAgent = "";
	public $browerCookie = "";
	public $data = "";
	public $created = "";
	public $updated = "";
	
	public $accessCache = null;
	
	public static $table_name = "session";	
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "client",  "column" => "clientId", "type" => "Client", "readonly" => false),
		array("property" => "key",  "column" => "key", "type" => "string", "readonly" => false),
		array("property" => "secret",  "column" => "secret", "type" => "string", "readonly" => false),
		array("property" => "ip",  "column" => "ip", "type" => "string", "readonly" => false),
		array("property" => "userAgent",  "column" => "userAgent", "type" => "string", "readonly" => false),
		array("property" => "browserCookie",  "column" => "browserCookie", "type" => "string", "readonly" => false),
		array("property" => "data",  "column" => "data", "type" => "string", "readonly" => false),
		array("property" => "created",  "column" => "created", "type" => "string", "readonly" => true),
		array("property" => "updated",  "column" => "updated", "type" => "string", "readonly" => true)
	);	
	
	function Session($id = "") {
		$this->id = $id;
	}

	public function load() {
		DB::load($this);
	}
	
	public function loadUsingKey($time) {
		$row = false;
		if (DB::$mc) {
			$row = DB::$mc->get(DB::$mc_key_prefix . "_SESSION_" . $this->key);
		}
		if (!$row) {
			$sql = "SELECT * FROM " . DB::getTableName($this) . " WHERE `key`='" . DB::mysqli_real_escape_string($this->key) . "' AND updated>=DATE_SUB(NOW() , INTERVAL " . (0 + $time) . " SECOND)";
			$result = DB::mysqli_query($sql);
			$row = mysqli_fetch_object($result);
			if (!$row) {
				throw new Exception("");
			}
		}
		DB::load($this, $row);
	}

	public function save() {
		DB::save($this);
	}

	public function create() {
		$sql = "INSERT INTO " . DB::getTableName($this) . " (`key`, secret, created) VALUES ('" . DB::mysqli_real_escape_string($this->key) . "', '" . DB::mysqli_real_escape_string($this->secret) . "', NOW())";
		DB::mysqli_query($sql);
		if (!DB::mysqli_affected_rows()) {
			throw new Exception("");
		}
		$this->id = DB::mysqli_insert_id();
	}

	public function update($cacheTime) {
		if (DB::$mc && $this->client) {
			$row = new stdClass();
			$row->id = $this->id;
			$row->clientId = $this->client->id;
			$row->key = $this->key;
			$row->secret = $this->secret;
			$row->ip = $this->ip;
			$row->userAgent = $this->userAgent;
			$row->browserCookie = $this->browserCookie;
			$row->data = $this->data;
			$row->created = $this->created;
			$row->updated = $this->updated;
			$b = DB::$mc->set(DB::$mc_key_prefix . "_SESSION_" . $this->key, $row, MEMCACHE_COMPRESSED, $cacheTime);
		}
		$sql = "UPDATE  " . DB::getTableName($this) . "
				SET 
					clientId=" . ($this->client ? $this->client->id : 'clientId') .",
					data='" . DB::mysqli_real_escape_string($this->data) . "',
					updated=NOW(),
					ip='" . DB::mysqli_real_escape_string($this->ip) . "', 
					userAgent='" . DB::mysqli_real_escape_string($this->userAgent) . "',
					browserCookie='" . DB::mysqli_real_escape_string($this->browserCookie) . "'
				WHERE id=" . $this->id;
		DB::mysqli_query($sql);
		if (!DB::mysqli_affected_rows()) {
			throw new Exception("");
		}
	}

	public function delete() {
		DB::delete($this);
	}
	
	public static function GC($time) {
	}
	
	public function updateAccessCache() {
		$sql = "DELETE FROM " . DB::$table_prefix . "accessCache WHERE sessionId=" . $this->id;
		DB::mysqli_query($sql);
		$sql = "INSERT INTO " . DB::$table_prefix . "accessCache (sessionId, accessId, granted) VALUES ";
		foreach ($this->accessCache as $accessId => $granted) {
			if ($granted) $granted = "'" . $granted . "'";
			else $granted = "NULL";
			$sql = $sql . "(" . $this->id . "," . $accessId . "," . $granted . "),";
		}
		$sql = substr($sql, 0, strlen($sql) - 1);
		$result = DB::mysqli_query($sql);
	}
	
	public function calculateAccessCache() {
		$a = array();
		$sql = "SELECT accessId, granted FROM " . DB::$table_prefix . "sessionAccess WHERE sessionId=" . $this->id . " AND grantOrDeny=1";
		$result = DB::mysqli_query($sql);
		if ($result) while ($row = mysqli_fetch_object($result)) {
			$a[$row->accessId] = $row->granted;
		}
		return $a;
	}

}

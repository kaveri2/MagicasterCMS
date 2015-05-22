<?php
class searcher_Result
{
	public $id 					= 0;
	public $adminName			= "";
	public $access				= null;
	public $data				= "";
	
	public static $table_name = "searcher_result";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "adminName", "column" => "adminName", "type" => "string", "readonly" => false),
		array("property" => "access", "column" => "accessId", "type" => "Access", "readonly" => false),
		array("property" => "data", "column" => "data", "type" => "string", "readonly" => false)
	);
	
	function searcher_Result($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this);
	}
	
	public function save() {
		DB::save($this);
	}
	
	public function addSearch_keyword($searcher_keyword) {
		$sql = "INSERT INTO " . DB::$table_prefix . "searcher_resultSearcher_keyword (searcher_resultId, searcher_keywordId) VALUES (" . $this->id . ", " . $searcher_keyword->id . ")";
		$result = DB::mysqli_query($sql);
	}

	public function removeSearch_keyword($searcher_keyword) {
		$sql = "DELETE FROM " . DB::$table_prefix . "searcher_resultSearcher_keyword WHERE searcher_resultId=" . $this->id . " AND searcher_keywordId=" . $searcher_keyword->id;
		$result = DB::mysqli_query($sql);
	}
	
}
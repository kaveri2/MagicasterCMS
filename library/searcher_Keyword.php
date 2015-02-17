<?
class searcher_Keyword
{
	public $id 					= 0;
	public $adminName			= "";
	
	public static $table_name = "searcher_keyword";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "adminName", "column" => "adminName", "type" => "string", "readonly" => false)
	);
	
	function searcher_Keyword($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this);
	}
	
	public function save() {
		DB::save($this);
	}
}
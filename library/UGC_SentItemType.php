<?
class UGC_SentItemType
{
	public $id = 0;
	public $adminName = "";
	
	public static $table_name = "UGC_sentItemType";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "adminName", "column" => "adminName", "type" => "string", "readonly" => false)
	);
	
	function UGC_SentItemType($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this);
	}
	
	public function save() {
		DB::save($this);
	}
}
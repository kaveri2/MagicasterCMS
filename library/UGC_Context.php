<?
class UGC_Context
{
	public $id 					= 0;
	public $adminName			= "";
	public $name				= "";
	public $access				= null;
	
	public static $table_name = "UGC_context";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "adminName", "column" => "adminName", "type" => "string", "readonly" => false),
		array("property" => "name", "column" => "name", "type" => "string", "readonly" => false),
		array("property" => "access", "column" => "accessId", "type" => "Access", "readonly" => false)
	);
		
	function UGC_Context($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this);
	}
	
	public function save() { 
		DB::save($this);
	}
}
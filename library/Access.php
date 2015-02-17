<?
class Access
{
	public $id 					= 0;
	public $adminName			= "";
	
	public static $table_name = "access";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "adminName",  "column" => "adminName", "type" => "string", "readonly" => false)
	);
		
	function Access($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this); 
	}
	
	public function save() { 
		DB::save($this);
	}
}
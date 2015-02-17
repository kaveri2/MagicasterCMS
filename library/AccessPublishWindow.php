<?
class AccessPublishWindow
{
	public $access = null;
	public $start = "";
	public $end = "";
	
	public static $table_name = "accessPublishWindow";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "access",  "column" => "accessId", "type" => "Access", "readonly" => false),
		array("property" => "start",  "column" => "start", "type" => "string", "readonly" => false),
		array("property" => "end",  "column" => "end", "type" => "string", "readonly" => false)
	);
		
	function AccessPublishWindow($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this); 
	}
	
	public function save() { 
		DB::save($this);
	}
	
	public function delete() { 
		DB::delete($this);
	}

	public static function calculateAccessCache() {
		$a = array();
		$sql = "SELECT accessId, `start` AS granted FROM " . DB::$table_prefix . AccessPublishWindow::$table_name . " WHERE (`start` IS NULL OR `start`<NOW()) AND (`end` IS NULL OR `end`>NOW())";
		$result = DB::mysql_query($sql);
		while ($row = mysql_fetch_object($result)) {
			$a[$row->accessId] = $row->granted;
		}
		return $a;
	}
}
<?
class UGC_SentItem
{
	public $id 					= 0;
	public $UGC_context			= null;
	public $UGC_sentItemType	= null;
	public $UGC_item			= null;
	public $data				= "";
	public $created				= "";
	public $ip					= "";
	public $client				= null;
	public $browserCookie		= "";
	public $moderated			= "";
	public $deleted				= "";
	
	public static $table_name = "UGC_sentItem";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "UGC_sentItemType", "column" => "UGC_sentItemTypeId", "type" => "UGC_SentItemType", "readonly" => false),
		array("property" => "UGC_context", "column" => "UGC_contextId", "type" => "UGC_Context", "readonly" => false),
		array("property" => "UGC_item", "column" => "UGC_itemId", "type" => "UGC_Item", "readonly" => false),
		array("property" => "hash", "column" => "hash", "type" => "string", "readonly" => false),
		array("property" => "data", "column" => "data", "type" => "string", "readonly" => false),
		array("property" => "created", "column" => "created", "type" => "string", "readonly" => false),
		array("property" => "ip", "column" => "ip", "type" => "string", "readonly" => false),
		array("property" => "client", "column" => "clientId", "type" => "Client", "readonly" => false),
		array("property" => "browserCookie", "column" => "browserCookie", "type" => "string", "readonly" => false),
		array("property" => "moderated", "column" => "moderated", "type" => "string", "readonly" => false),
		array("property" => "deleted", "column" => "deleted", "type" => "string", "readonly" => false)
	);
	
	function UGC_SentItem($id = 0) {
		$this->id = $id;
	}
	
	public function load() {
		DB::load($this);
	}
	
	public function loadUsingHash() {
		$hash = DB::mysql_real_escape_string($this->hash);
		$sql = "SELECT * FROM " . DB::getTableName($this) . " WHERE hash='$hash'";
		$result = DB::mysql_query($sql);
		$row = mysql_fetch_object($result);
		if ($row) {
			DB::load($this, $row);
		}
	}
	
	public function save() {
		DB::save($this);
	}
}
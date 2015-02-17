<?
class UGC_Item
{
	public $id 					= 0;
	public $UGC_context			= null;
	public $UGC_itemType		= null;
	public $UGC_sentItem		= null;
	public $published			= "";
	public $created				= "";
	public $data				= "";
	
	public static $table_name = "UGC_item";
	public static $table_id_type = "integer";
	public static $table_columns = array(
		array("property" => "UGC_context", "column" => "UGC_contextId", "type" => "UGC_Context", "readonly" => false),
		array("property" => "UGC_itemType", "column" => "UGC_itemTypeId", "type" => "UGC_ItemType", "readonly" => false),
		array("property" => "UGC_sentItem", "column" => "UGC_sentItemId", "type" => "UGC_SentItem", "readonly" => false),
		array("property" => "published", "column" => "published", "type" => "string", "readonly" => false),
		array("property" => "created", "column" => "created", "type" => "string", "readonly" => false),
		array("property" => "data", "column" => "data", "type" => "string", "readonly" => false)
	);
	
	function UGC_Item($id = 0) {
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
}
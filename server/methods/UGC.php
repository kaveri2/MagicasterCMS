<?

// private


// public

function public_UGC_get($xml)
{
	$id = 0 + $xml->UGC_item->id;
	$check = "" . $xml->UGC_item->check;
	
	$UGC_item = new UGC_Item($id);

	if (!Core::compareCheck($UGC_item, $check)) {
//		return;
	}
		
	try {
		$UGC_item->load();
	} catch (Exception $e) {
		return;
	}
	
	if ($UGC_item->UGC_context) {
		$UGC_item->UGC_context->load();
	}
	
	$s = Core::toXMLString("", $UGC_item, 
			array(
				"UGC_Item" => array("id", "UGC_itemType", "UGC_context", "published", "data"),
				"UGC_Context" => array("name"),
				"UGC_ItemType" => array("id")
			)
		);

	Core::addCounter("UGC.get_" . $id);
		
	return Core::processXMLString($s);
}

function public_UGC_search($xml)
{
	$UGC_contextId = 0 + $xml->UGC_context->id;
	$limit = 0 + $xml->limit;
	if (!$limit || $limit > 12) $limit = 12;
	$page = 0 + $xml->page;

	Core::addCounter("UGC.search_UGC_contextId_" . $UGC_contextId);

	$UGC_items = DB::search(
		array(
			"class" => "UGC_Item",
			"order_by" => "published DESC",
			"where" => "UGC_contextId=" . $UGC_contextId,
			"limit" => ($page * $limit) . ", " . ($limit + 1)
		)
	);
	
	$more = false;
	if (count($UGC_items) == $limit + 1) {
		array_pop($UGC_items);
		$more = true;
	}
		
	$s = Core::toXMLString("UGC_item", $UGC_items, 
			array(
				"UGC_Item" => array("id", "UGC_itemType", "published", "data"),
				"UGC_ItemType" => array("id")
			)
		);
		
	$s = $s . "<more>" . ($more ? "true" : "false") . "</more>";

	Core::addCounter("UGC.search_" . $UGC_contextId . "_" . $limit . "_" . $page);
	
	return Core::processXMLString($s);
}

function public_UGC_send($xml)
{
	$contextId = 0 + $xml->UGC_context->id;
	$contextCheck = "" . $xml->UGC_context->check;
	$UGC_context = new UGC_Context($contextId);
	if (!Core::compareCheck($UGC_context, $contextCheck)) {
//		return;
	}
	
	$typeId = "" . $xml->UGC_sentItemType->id;
	$typeCheck = "" . $xml->UGC_sentItemType->check;
	$UGC_sentItemType = new UGC_SentItemType($typeId);
	if (!Core::compareCheck($UGC_sentItemType, $typeCheck)) {
//		return;
	}
	
	$data = "";
	foreach ($xml->data[0]->children() as $c) {
		$data .= $c->asXML();
	}
	$created = date('Y-m-d H:i:s');
	if ($_SERVER['HTTP_X_FORWARD_FOR']) {
		$ip = $_SERVER['HTTP_X_FORWARD_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
		
	$UGC_sentItem = new UGC_SentItem();
	$UGC_sentItem->UGC_context = $UGC_context;
	$UGC_sentItem->UGC_sentItemType = $UGC_sentItemType;
	$UGC_sentItem->data = $data;
	$UGC_sentItem->created = $created;
	$UGC_sentItem->ip = $ip;
	$UGC_sentItem->client = Core::$session->client;
	$UGC_sentItem->browserCookie = Core::$session->browserCookie;

	for ($i = 0 ; $i<999 ; $i++) {
		$UGC_sentItem->hash = md5(uniqid("", true) . "kissa" . uniqid("", true));
		$UGC_sentItem->save();
		if ($UGC_sentItem->id > 0) {
			break;
		}
	}
	
	Core::addCounter("UGC.send_" . $contextId);

	return "";
}
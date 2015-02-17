<?

// private


// public

function public_UGC_Context_get($xml)
{
	$id = 0 + $xml->UGC_context->id;
	$check = "" . $xml->UGC_context->check;
	
	$UGC_context = new UGC_Context($id);

	if (!Core::compareCheck($UGC_item, $check)) {
//		return;
	}
		
	try {
		$UGC_context->load();
	} catch (Exception $e) {
		return;
	}
	
	$s = Core::toXMLString("", $UGC_context, 
			array(
				"UGC_Context" => array("id", "name")
			)
		);

	Core::addCounter("UGC_Context.get_" . $id);
		
	return Core::processXMLString($s);
}
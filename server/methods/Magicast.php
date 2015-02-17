<?php

function public_Magicast_get($xml) 
{
			
	$id = 0 + $xml->id;
	$check = "" . $xml->check;
		
	$m = new Magicast($id);

	try {
		$m->load();
	} catch (Exception $e) {
		return;
	}
	
	// if public, do not require check!
	if (!$m->public && !Core::compareCheck($m, $check)) {
		return;
	}
		
	$s = Core::toXMLString("", $m, 
			array(
				"Magicast" => array("id", "data" => "data"),
			)
		);

	if ("" . $xml->refresh == "false") {
		Core::addCounter("Magicast.get_" . $id);
	}
		
	return Core::processXMLString($s);
}

function public_Magicast_nodeChanged($xml) 
{		
	$id = 0 + $xml->id;
	$check = "" . $xml->check;
	$node = "" . $xml->node;
	
	$m = new Magicast($id);
	
	if (!Core::compareCheck($m, $check)) {
		return;
	}

	Core::addCounter("Magicast.nodeChanged_" . $id . "_" . $node);
}

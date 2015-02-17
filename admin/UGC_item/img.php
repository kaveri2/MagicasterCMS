<?php
	include("../core.php");

	if (!isset($_REQUEST["id"])) {
		exit();
	}
	
	$item = new UGC_SentItem($_REQUEST["id"]);
	$item->load();
	
	$xml = new SimpleXMLElement("<data>" . $item->data . "</data>");
	$image = base64_decode($xml->image);
	
//	$im = imagecreatefromstring($image);

	header('Content-Type: image');
	echo $image;
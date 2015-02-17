<?php
	include("../core.php");
	
	$UGC_item = new UGC_Item(0 + $_GET['id']);
	try {
		$UGC_item->load();
		$UGC_sentItem = $UGC_item->UGC_sentItem;
		try {
			$UGC_sentItem->load();
			
			$xml = new SimpleXMLElement("<data>" . $UGC_sentItem->data . "</data>");
			$image = base64_decode($xml->image);
			$im = imagecreatefromstring($image);
			imagejpeg($im, $CONFIG['UGC_item']['save_root'] . $UGC_sentItem->hash . ".jpg");

			$w = imagesx($im);
			$h = imagesy($im);
			$scale = max(100 / $w, 100 / $h);
				
			$im_i = imagecreatetruecolor($w * $scale, $h * $scale);
			imagecopyresampled($im_i, $im, 0, 0, 0, 0, $w * $scale, $h * $scale, $w, $h);
			imagejpeg($im_i, $CONFIG['UGC_item']['save_root'] . $UGC_sentItem->hash . "_icon.jpg");
			
			echo("Success!");
		} catch (Exception $e) {
			echo("Failure: No UGC sent item found!");
		}
	} catch (Exception $e) {
		echo("Failure: No UGC item found!");
	}
?>
<?php

function public_Test_disableCheck($xml) {
	
	global $CONFIG;

	$secret = "" . $xml->secret;
	
	if ($secret == $CONFIG[__FUNCTION__]['secret']) {
		$_SESSION['disableCheck'] = true;
	}
}

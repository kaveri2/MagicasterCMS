<?php
	require_once("../core.php");
	
	$magicast = new Magicast(0 + $_REQUEST["id"]);
	$magicast->load();
	echo($magicast->data);
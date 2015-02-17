<?
	require_once("../core.php");
	
	$id = 0 + $_REQUEST['id'];	
	header("Location: " . $CONFIG["base_url"] . "/access/save.php?id=" + $id);
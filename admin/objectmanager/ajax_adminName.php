<?php
	require_once("../core.php");

	$class = $_REQUEST['class'];
	$id = (0 + $_REQUEST["id"]);
	
	$object = new $class;
	$object->id = $id;
	
	try {
		$object->load();
		echo $object->adminName;
	} catch (Exception $e) {
		echo "N/A";
	}
<?php
	require_once("../core.php");
	
	$id = isset($_REQUEST["id"]) ? 0 + $_REQUEST["id"] : 0;

	$sql = "SELECT adminName FROM " . DB::$table_prefix . "access WHERE id=" . $id;
	try
	{
		$result = DB::mysqli_query($sql);
		if ($row = mysqli_fetch_object($result)) {
			echo($row->adminName);
		} else {
			echo("N/A");
		}
	}
	catch (Exception $e)
	{	
		echo("Error!");
	}
?>

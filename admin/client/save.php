<?php
	include("../core.php");

	$client = new Client(isset($_REQUEST["id"]) ? 0 + $_REQUEST["id"] : 0);
	if ($client->id) { 
		$client->load(); 
	}
	
	if (isset($_REQUEST["add_clientAccess_accessId"])) {
		$access = new Access(0 + $_REQUEST["add_clientAccess_accessId"]);
		$client->addAccess($access);
	}
	
	if (isset($_REQUEST["remove_clientAccess_accessId"])) {
		$access = new Access(0 + $_REQUEST["remove_clientAccess_accessId"]);
		$client->removeAccess($access);
		header("Location: " . $CONFIG["base_url"] . "/client/save.php?id=" . $client->id);
	}
	
	if (isset($_REQUEST["save"])) {	
		$client->name = $_REQUEST["name"];
		$client->save();
		header("Location: " . $CONFIG["base_url"] . "/client/save.php?id=" . $client->id);
	}

	include("../header.php");
?>

	<div id="content-head">
		
		<div id="content-head-left">
			<h1><?php echo $client->id ? "Edit" : "New" ?> client</h1>
		</div>
		
		<div id="content-head-right"></div>
		
		<div id="content-head-footer"></div>
		
	</div>

<div id="content">

	<form id="saveForm" method="post">
		<p>
			<label class="top-label">Name</label>
			<input type="text" name="name" id="adminName" value="<?php echo $client->name; ?>" />
		</p>
		<p>
			<input name="save" type="submit" class="big-button" value="Save" />
		</p>
	</form>	
	
<?php
	if ($client->id) {
?>
	
	<fieldset class="grouping">
	<legend>Accesses</legend>
<?php
	function removeAccess($object) {
		global $client;
		return "<a class='remove' href='save.php?id=" . $client->id . "&remove_clientAccess_accessId=" . $object->id . "'>[remove]</a>";
	}
	
	$where = "clientId=" . $client->id;
	$clientAccesses = DB::search(
		array(
			"class" => "Access",
			"join" => "INNER JOIN " . DB::$table_prefix . "clientAccess ON (" . DB::$table_prefix . "access.id=" . DB::$table_prefix . "clientAccess.accessId)",
			"order_by" => "adminName", 
			"where" => $where
	));	
	
	printListTable(
		array(
			array("header" => "Id", "key" => "id"),
			array("header" => "Admin name", "key" => "adminName"),
			array("header" => "", "functions" => array("removeAccess"))
		),
		$clientAccesses
	);			
?>

	<fieldset>
	<legend>Add access</legend>

	<form id="add_clientAccess" method="post" action="">
		<div id="accessmanager"></div>
		<input id="add_clientAccess_button" type="submit" class="big-button" value="Add" />
	</form>			
	</fieldset>
	</fieldset>
<?php
	}
?>

	<script type="text/javascript">
	$(function() {
		$("#accessmanager").accessmanager("create");
		$("#add_clientAccess_button").click(function() {
			accessId =  $("#accessmanager").accessmanager("val");
			$("#add_clientAccess").append("<input name='add_clientAccess_accessId' value='" + accessId + "' />");
		}); 
		$("a.remove").click(function() {
			return window.confirm("Are you sure?");
		});
		// Focus element
		$('input#adminName').focus();
	});
	</script>
	
<?php
	include("../footer.php");
?>

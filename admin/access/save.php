<?php
	include("../core.php");

	$access = new Access(isset($_REQUEST["id"]) ? 0 + $_REQUEST["id"] : 0);
	if ($access->id) { 
		$access->load(); 
	}
	
	if (isset($_REQUEST["create_accessPublishWindow"])) {
		$accessPublishWindow = new AccessPublishWindow();
		$accessPublishWindow->access = $access;
		$accessPublishWindow->start = "" . $_REQUEST["create_accessPublishWindow_start"];
		$accessPublishWindow->end = "" . $_REQUEST["create_accessPublishWindow_end"];
		$accessPublishWindow->save();
	}
	
	if (isset($_REQUEST["delete_accessPublishWindow_id"])) {
		$accessPublishWindow = new AccessPublishWindow($_REQUEST["delete_accessPublishWindow_id"]);
		$accessPublishWindow->delete();
		header("Location: " . $CONFIG["base_url"] . "/access/save.php?id=" . $access->id);
	}
	
	if (isset($_REQUEST["save"])) {	
		$access->adminName = $_REQUEST["adminName"];
		$access->save();
		header("Location: " . $CONFIG["base_url"] . "/access/save.php?id=" . $access->id);
	}

	include("../header.php");
?>
	<div id="content-head">
		<div id="content-head-left">
			<h1><?php echo $access->id ? "Edit" : "New" ?> access</h1>
		</div>
		<div id="content-head-right">
			
		</div>
		<div id="content-head-footer"></div>
	</div>

	<div id="content">


	<form id="saveForm" method="post">
		<p>
			<label class="top-label">Admin name</label>
			<input type="text" name="adminName" id="adminName" value="<?php echo $access->adminName; ?>" />
		</p>
		<p>
			<input name="save" type="submit" class="big-button" value="Save" />
		</p>
	</form>	
	
<?php
	if ($access->id) {
?>
	<fieldset class="grouping">
	<legend>Publish windows</legend>
<?php
	function deletePublishWindow($object) {
		global $access;
		return "<a class='delete' href='save.php?id=" . $access->id . "&delete_accessPublishWindow_id=" . $object->id . "'>[delete]</a>";
	}
	
	$where = "accessID=" . $access->id;
	$accessPublishWindows = DB::search(
		array(
			"class" => "AccessPublishWindow", 
			"order_by" => "start, end", 
			"where" => $where
	));	
	
	printListTable(
		array(
			array("header" => "ID", "key" => "id"),
			array("header" => "Start", "key" => "start"),
			array("header" => "End", "key" => "end"),
			array("header" => "Actions", "functions" => array("deletePublishWindow"))
		),
		$accessPublishWindows
	);			
?>

	<fieldset>
	<legend>Create publish window</legend>

	<form method="post" action="">
		<p>
		<label class="top-label">Start (empty = from the beginning)</label>
		<input type="text" name="create_accessPublishWindow_start" class="datetimepicker" value="" />
		
		<label class="top-label">End (empty = until the end)</label>
		<input type="text" name="create_accessPublishWindow_end" class="datetimepicker" value="" />
		</p>
		<p>
		<input type="submit" name="create_accessPublishWindow" value="Create" class="big-button"/>
		</p>
	</form>
	</fieldset>
	</fieldset>
<?php
	}
?>

	<script type="text/javascript">
	$(function() {
		$('.datetimepicker').datetimepicker({
			showSecond: true,
			dateFormat: 'yy-mm-dd',
			timeFormat: 'hh:mm:ss'
		});
		$("a.delete").click(function() {
			return window.confirm("Are you sure?");
		});
		// Focus element
		$('input#adminName').focus();
	});
	</script>
	
<?php
	include("../footer.php");
?>

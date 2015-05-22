<?php
	require_once("../core.php");

	$access = new Access(isset($_REQUEST["id"]) ? (0 + $_REQUEST["id"]) : 0);
	if ($access->id) {
		$access->load(); 
	}

	if (isset($_REQUEST["save"])) {	
		$access->adminName = $_REQUEST["adminName"];
		$access->save();
		echo $access->id;
		exit;
	}
?>

<fieldset class="grouping">
	<legend><?php echo $access->id ? "Select" : "Create" ?> access</legend>
	<input type="text" id="adminName" value="<?php echo $access->adminName; ?>" <?php echo $access->id ? 'disabled="disabled"' : '' ?> />
	<br/>	
	<input id="accessSave" type="button" class="small-button" value="<?php echo $access->id ? "Select" : "Create" ?>" />
	<input id="accessCancel" type="button" class="small-button" value="Cancel" />

</fieldset>

<script type="text/javascript">
	$(function() {
		// Focus
		$('fieldset.grouping #adminName').focus();
		// Keyboard shortcuts
		$('input#adminName').bind('keydown', 'return', function() {
			$('input#accessSave').trigger('click');
			return false;
		});
	});
</script>
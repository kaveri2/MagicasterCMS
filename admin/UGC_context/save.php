<?php
	include("../core.php");

	$UGC_context = new UGC_context(isset($_REQUEST["id"]) ? 0 + $_REQUEST["id"] : 0);
	if ($UGC_context->id) { 
		$UGC_context->load(); 
	} else {
		$UGC_context->access = new Access();
	}
	
	if (isset($_REQUEST["save"])) {	
		$UGC_context->adminName = $_REQUEST["adminName"];
		$UGC_context->name = $_REQUEST["name"];
		$UGC_context->access = new Access(0 + $_REQUEST["accessId"]);
		$UGC_context->save();
		header("Location: " . $CONFIG["base_url"] . "/UGC_context/save.php?id=" . $UGC_context->id);
	}

	include("../header.php");
?>
	<div id="content-head">
		<div id="content-head-left">
			<h1><?php echo $UGC_context->id ? "Edit" : "Create" ?> UGC Context</h1>
		</div>
		<div id="content-head-right">
			
		</div>
		<div id="content-head-footer"></div>
	</div>

	<div id="content">
	
	<form id="form" method="post">
		<p>
			<label class="top-label">Admin name</label>
			<input type="text" name="adminName" id="adminName" value="<?php echo $UGC_context->adminName; ?>" />
			<label class="top-label">Name</label>
			<input type="text" name="name" id="name" value="<?php echo $UGC_context->name; ?>" />
			<label class="top-label">Access</label>
			<div id="access"><?php echo $UGC_context->access->id ?></div>
		</p>
		<p>
			<input id="save" name="save" type="submit" class="big-button" value="Save" />
		</p>
	</form>	
	
	<script type="text/javascript">
	$(function() {
		$('#access').accessmanager("create");
		$("#save").click(function() {
			$("#form").append("<input type=\"hidden\" name=\"accessId\" value=\"" + $("#access").accessmanager("val") + "\" />");
		});
		// Focus element
		$('input#adminName').focus();
	});
	</script>
	
<?php
	include("../footer.php");
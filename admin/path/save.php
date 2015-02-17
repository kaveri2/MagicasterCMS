<?php
	include("../core.php");
		
	$path = new Path();
	if (isset($_REQUEST["id"])) {
		$path->id = 0 + $_REQUEST["id"];
	}
	if ($path->id) { 
		$path->load(); 
	} else {
		$path->access = new Access();
	}

	if (isset($_REQUEST["save"])) {	
	
		$path->adminName = $_REQUEST["adminName"];
		$path->weight = $_REQUEST["weight"];
		$path->access = new Access(0 + $_REQUEST["accessId"]);
		$path->search = $_REQUEST["search"];
		$path->data = $_REQUEST["data"];
		$path->seo = $_REQUEST["seo"];
		$path->save();

		header("Location: save.php?id=" . $path->id);
		exit();
	}

	include("../header.php");
?>
	<div id="content-head">
		
		<div id="content-head-left">
			<h1><?= $path->id ? "Edit" : "New" ?> path</h1>
		</div>
		
		<div id="content-head-right">

		</div>
		
		<div id="content-head-footer"></div>
				
	</div>

<div id="content">
	
	<form id="form" method="post">
	
		<p>
			<label for="adminName" class="top-label">Admin name</label>
			<input class="text" type="text" name="adminName" id="adminName" value="<?= $path->adminName; ?>" />
			<label class="top-label">Search (regular expression)</label>
			<input type="text" name="search" value="<?= $path->search; ?>" />
			<label class="top-label">Weight</label>
			<input type="text" name="weight" value="<?= $path->weight; ?>" />
			<label class="top-label">Access</label>
			<div id="access"><?= $path->access->id ?></div>
			<label class="top-label">Data</label>
			<div id="xmleditor_data"><textarea><?= $path->data ?></textarea></div>
			<label class="top-label">SEO</label>
			<div id="xmleditor_seo"><textarea><?= $path->seo ?></textarea></div>
		</p>
		<p>
			<input id="save" name="save" type="submit" class="big-button" value="Save" />
		</p>
	</form>	
	

	<script type="text/javascript">
	$(function() {
		$('#access').accessmanager("create");
		$("#xmleditor_data").xmleditor('load', 'xmleditor_data/data.php'); 
		$("#xmleditor_seo").xmleditor('load', 'xmleditor_data/seo.php'); 
		$("#save").click(function() {
			$("#form").append("<input type=\"hidden\" name=\"accessId\" value=\"" + $("#access").accessmanager("val") + "\" />");
			$("#form").append("<textarea name=\"data\">" + $("#xmleditor_data").xmleditor("val") + "</textarea>");
			$("#xmleditor_data").empty();
			$("#form").append("<textarea name=\"seo\">" + $("#xmleditor_seo").xmleditor("val") + "</textarea>");
			$("#xmleditor_seo").empty();
		});
		// Focus element
		$('input#adminName').focus();
	});
	</script>
	
<?
	include("../footer.php");
?>
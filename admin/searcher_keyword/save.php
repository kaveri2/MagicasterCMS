<?php
	include("../core.php");

	$searcher_keyword = new searcher_Keyword(isset($_REQUEST["id"]) ? 0 + $_REQUEST["id"] : 0);
	if ($searcher_keyword->id) { 
		$searcher_keyword->load(); 
	}
	
	if (isset($_REQUEST["save"])) {	
		$searcher_keyword->adminName = $_REQUEST["adminName"];
		$searcher_keyword->save();
		header("Location: " . $CONFIG["base_url"] . "searcher_keyword/save.php?id=" . $searcher_keyword->id);
	}
	
	include("../header.php");
?>
	<div id="content-head">
		<div id="content-head-left">
			<h1><?php echo $searcher_keyword->id ? "Edit" : "Create" ?> Searcher Keyword</h1>
		</div>
		<div id="content-head-right">
			
		</div>
		<div id="content-head-footer"></div>
	</div>

	<div id="content">
	
	<form id="form" method="post">
		<p>
			<label class="top-label">Admin name</label>
			<input type="text" name="adminName" id="adminName" value="<?php echo $searcher_keyword->adminName; ?>" />
		</p>
		<p>
			<input id="save" name="save" type="submit" class="big-button" value="Save" />
		</p>
	</form>	
	
	<script type="text/javascript">
	$(function() {
		// Focus element
		$('input#adminName').focus();
	});
	</script>
	
<?php
	include("../footer.php");
<?php
	include("../core.php");

	$searcher_result = new searcher_Result(isset($_REQUEST["id"]) ? 0 + $_REQUEST["id"] : 0);
	if ($searcher_result->id) { 
		$searcher_result->load(); 
	} else {
		$searcher_result->access = new Access();
	}
	
	if (isset($_REQUEST["save"])) {	
		$searcher_result->adminName = $_REQUEST["adminName"];
		$searcher_result->access = new Access(0 + $_REQUEST["accessId"]);
		$searcher_result->data = $_REQUEST["data"];
		$searcher_result->save();
		header("Location: " . $CONFIG["base_url"] . "searcher_result/save.php?id=" . $searcher_result->id);
	}
	
	if (isset($_REQUEST["add_searcher_keywordId"])) {
		$searcher_keyword = new searcher_Keyword(0 + $_REQUEST["add_searcher_keywordId"]);
		$searcher_result->addSearch_keyword($searcher_keyword);
	}
	
	if (isset($_REQUEST["remove_searcher_keywordId"])) {
		$searcher_keyword = new searcher_Keyword(0 + $_REQUEST["remove_searcher_keywordId"]);
		$searcher_result->removeSearch_keyword($searcher_keyword);
		header("Location: " . $CONFIG["base_url"] . "searcher_result/save.php?id=" . $searcher_result->id);
	}
	

	include("../header.php");
?>
	<div id="content-head">
		<div id="content-head-left">
			<h1><?php echo $searcher_result->id ? "Edit" : "Create" ?> Searcher Result</h1>
		</div>
		<div id="content-head-right">
			
		</div>
		<div id="content-head-footer"></div>
	</div>

	<div id="content">
	
	<form id="form" method="post">
		<p>
			<label class="top-label">Admin name</label>
			<input type="text" name="adminName" id="adminName" value="<?php echo $searcher_result->adminName; ?>" />
			<label class="top-label">Access</label>
			<div id="access"><?php echo $searcher_result->access->id ?></div>
			<label class="top-label">Data</label>
			<div id="xmleditor_data"><textarea><?php echo $searcher_result->data ?></textarea></div>
		</p>
		<p>
			<input id="save" name="save" type="submit" class="big-button" value="Save" />
		</p>
	</form>	
	
<?php
	if ($searcher_result->id) {
?>
	
	<fieldset class="grouping">
	<legend>Search Keywords</legend>
<?php
	function removeItem($item) {
		global $searcher_result;
		return "<a class='remove' href='save.php?id=" . $item->id . "&remove_searcher_keywordId=" . $item->id . "'>[remove]</a>";
	}
	
	$items = DB::search(
		array(
			"class" => "searcher_Keyword",
			"join" => "INNER JOIN " . DB::$table_prefix . "searcher_resultSearch_keyword ON (" . DB::$table_prefix . "searcher_keyword.id=" . DB::$table_prefix . "searcher_resultSearch_keyword.searcher_keywordId)",
			"order_by" => "adminName",
			"where" => "searcher_resultId=" . $searcher_result->id
	));	
	
	printListTable(
		array(
			array("header" => "Id", "key" => "id"),
			array("header" => "Admin name", "key" => "adminName"),
			array("header" => "", "functions" => array("removeItem"))
		),
		$items
	);			
?>

	<fieldset>
	<legend>Add Searcher Keyword</legend>

	<form id="add_searcher_keyword" method="post" action="">
		<div id="searcher_keyword"></div>
		<input id="add_searcher_keyword_button" type="submit" class="big-button" value="Add" />
	</form>			
	</fieldset>
	</fieldset>
<?php
	}
?>	
	
	<script type="text/javascript">
	$(function() {
		$('#searcher_keyword').objectmanager("create", "searcher_Keyword");
		$('#access').accessmanager("create");
		$("#xmleditor_data").xmleditor('load', 'xmleditor_data/data.php'); 
		$("#add_searcher_keyword_button").click(function() {
			$("#add_searcher_keyword").append("<input type=\"hidden\" name=\"add_searcher_keywordId\" value=\"" + $("#searcher_keyword").objectmanager("val") + "\" />");
		});
		$("#save").click(function() {
			$("#form").append("<input type=\"hidden\" name=\"accessId\" value=\"" + $("#access").accessmanager("val") + "\" />");
			$("#form").append("<textarea name=\"data\">" + $("#xmleditor_data").xmleditor("val") + "</textarea>");
			$("#xmleditor_data").empty();
		});
		// Focus element
		$('input#adminName').focus();
	});
	</script>
	
<?php
	include("../footer.php");
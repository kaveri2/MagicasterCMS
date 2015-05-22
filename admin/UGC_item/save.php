<?php
	include("../core.php");
	
	$item = new UGC_Item(isset($_REQUEST["id"]) ? 0 + $_REQUEST["id"] : 0);
	if ($item->id) { 
		$item->load(); 
	} else {
		$item->UGC_context = new UGC_Context();
		$item->UGC_itemType = new UGC_ItemType();
	}
	if (isset($_REQUEST["save"])) {	
		$item->UGC_context = new UGC_Context(0 + $_REQUEST["UGC_contextId"]);
		$item->UGC_itemType = new UGC_ItemType(0 + $_REQUEST["UGC_itemTypeId"]);
		$item->data = $_REQUEST["data"];
		if ("" . $_REQUEST["published"] != "") {
			$item->published = $_REQUEST["published"];
		} else {
			$item->published = date('Y-m-d H:i:s');
		}
		if ("" . $_REQUEST["created"] != "") {
			$item->created = $_REQUEST["created"];
		} else {
			$item->created = "0000-00-00 00:00:00";
		}
		$item->save();

		header("Location: save.php?id=" . $item->id);
		exit();
	}

	include("../header.php");
?>
	<div id="content-head">
		
		<div id="content-head-left">
			<h1><?php echo $item->id ? "Edit" : "Create" ?> UGC Item</h1>
		</div>
		
		<div id="content-head-right">

		</div>
		
		<div id="content-head-footer"></div>
				
	</div>

<div id="content">
	
	<form id="form" method="post">
	
		<p>
			<label class="top-label">UGC Context</label>
			<div id="UGC_context"><?php echo $item->UGC_context->id ?></div>
			<label class="top-label">UGC Item Type</label>
			<div id="UGC_itemType"><?php echo $item->UGC_itemType->id ?></div>
			<label class="top-label">Data</label>
			<div id="xmleditor_data"><textarea><?php echo $item->data ?></textarea></div>
			<label class="top-label">Created</label>
			<input type="text" name="created" class="datetimepicker" value="<?php echo $item->created ?>" />
			<label class="top-label">Published</label>
			<input type="text" name="published" class="datetimepicker" value="<?php echo $item->published ?>" />
		</p>
		<p>
			<input id="save" name="save" type="submit" class="big-button" value="Save" />
		</p>
	</form>	
	

	<script type="text/javascript">
	$(function() {
		$('#UGC_context').objectmanager("create", "UGC_Context");
		$('#UGC_itemType').objectmanager("create", "UGC_ItemType");		
		$("#UGC_itemType").objectmanager("change", function() {
			var val = $("#xmleditor_data").xmleditor("val");
			$("#xmleditor_data").xmleditor('load', 'xmleditor_data/<?php echo $CONFIG['UGC_item']['xmleditor_data_path'] ?>/' + $("#UGC_itemType").objectmanager("val") + '.php'); 
			$("#xmleditor_data").xmleditor("val", val);
		});
		$("#xmleditor_data").xmleditor('load', 'xmleditor_data/<?php echo $CONFIG['UGC_item']['xmleditor_data_path'] ?>/' + $("#UGC_itemType").objectmanager("val") + '.php'); 
		$("#save").click(function() {
			$("#form").append("<input type=\"hidden\" name=\"UGC_contextId\" value=\"" + $("#UGC_context").objectmanager("val") + "\" />");
			$("#form").append("<input type=\"hidden\" name=\"UGC_itemTypeId\" value=\"" + $("#UGC_itemType").objectmanager("val") + "\" />");
			$("#form").append("<textarea name=\"data\">" + $("#xmleditor_data").xmleditor("val") + "</textarea>");
			$("#xmleditor_data").empty();
		});
		$('.datetimepicker').datetimepicker({
			showSecond: true,
			dateFormat: 'yy-mm-dd',
			timeFormat: 'hh:mm:ss'
		});
	});
	</script>
	
<?php
	include("../footer.php");
?>
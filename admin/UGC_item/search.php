<?php
	require_once("../core.php");

	$page = isset($_REQUEST['page']) ? 0 + $_REQUEST['page'] : 0;
	$per_page = 100;
	
	$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : "";

	$HTML_title = "UGC Item / search / " . $search;
	
	include("../header.php");
?>
<div id="content-head">
		
			<div id="content-head-left">
				<h1>Search UGC Items</h1>
			</div>
			
			<div id="content-head-right">
				<form id="search" method="get" action="search.php">
					<input type="text" name="search" class="search-field" value="<?php echo $search ?>" />
					<input type="submit" id="searchSubmit" class="big-button" value="Search" />
				</form>
			</div>
			
			<div id="content-head-footer"></div>
			
</div>

<div id="content">
<?php

$where = "(LOWER(data) LIKE '%" . $search . "%') ";

$items = DB::search(
	array(
		"class" => "UGC_Item", 
		"page" => $page, 
		"per_page" => $per_page, 
		"order_by" => "published DESC", 
		"where" => $where
));

$contextCache = array();
function context($item) {
	if (!$item->UGC_context->id) {
		return "N/A";
	}
	global $contextCache;
	if (!isset($contextCache[$item->UGC_context->id])) {
		$item->UGC_context->load();
		$contextCache[$item->UGC_context->id] = $item->UGC_context->adminName;
	}
	return $contextCache[$item->UGC_context->id];
}
function itemType($item) {
	if (!$item->UGC_itemType->id) {
		return "N/A";
	}
	global $itemTypeCache;
	if (!isset($itemTypeCache[$item->UGC_itemType->id])) {
		$item->UGC_itemType->load();
		$itemTypeCache[$item->UGC_itemType->id] = $item->UGC_itemType->adminName;
	}
	return $itemTypeCache[$item->UGC_itemType->id];
}
function edit($item) {
	return "<a href='save.php?id=" . $item->id . "'>[edit]</a>";
}
function name($item) {
	if (!$item->data) {
		return "N/A";
	} else {
		$d = new SimpleXMLElement(trim($item->data));
		return $d->creator->name;
	}
}
printListTable(
	array(
		array("header" => "id", "key" => "id"),
		array("header" => "UGC Context", "functions" => array("context")),
		array("header" => "UGC Item Type", "functions" => array("itemType")),
		//array("header" => "Creator", "functions" => array("name")),
		array("header" => "Published", "key" => "published"),
		array("header" => "Created", "key" => "created"),
		array("header" => "", "functions" => array("edit"))
	),
	$items
);

$count = DB::count(
	array(
		"class" => "UGC_item", 
		"where" => $where
));	

function pageLink($i) {
	global $search;
	return "search.php?search=" . $search . "&page=" . $i;
}
printPager($page, ceil($count / $per_page), "pageLink");
?>
<script type="text/javascript">		
	$(function() {
		// Focus
		$('input.search-field').focus();
	});
</script>
<?php
	include("../footer.php");

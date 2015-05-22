<?php
	require_once("../core.php");

	$page = isset($_REQUEST['page']) ? 0 + $_REQUEST['page'] : 0;
	$per_page = 100;
	
	$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : "";

	$HTML_title = "Client / search / " . $search;
	
	include("../header.php");
?>

<div id="content-head">
		
			<div id="content-head-left">
				<h1>Search Clients</h1>
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

$search = strtolower($search);
$where = "(LOWER(name) LIKE '%" . $search . "%') ";

$clients = DB::search(
	array(
		"class" => "Client", 
		"page" => $page, 
		"per_page" => $per_page, 
		"order_by" => "name, id", 
		"where" => $where
));

function edit($item) {
	return "<a href='save.php?id=" . $item->id . "'>[edit]</a>";
}
printListTable(
	array(
		array("header" => "id", "key" => "id"),
		array("header" => "name", "key" => "name"),
		array("header" => "", "functions" => array("edit"))
	),
	$clients
);

$count = DB::count(
	array(
		"class" => "Client", 
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

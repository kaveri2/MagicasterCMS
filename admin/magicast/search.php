<?php
	require_once("../core.php");

	$page = isset($_REQUEST['page']) ? 0 + $_REQUEST['page'] : 0;
	$per_page = 100;
	
	$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : "";

	$HTML_title = "Magicast / search / " . $search;
	include("../header.php");
?>
<div id="content-head">
		
			<div id="content-head-left">
				<h1>Search Magicasts</h1>
			</div>
			
			<div id="content-head-right">
				<form id="search" method="get" action="search.php">
					<input type="text" name="search" class="search-field" id="search-magicast" value="<?php echo $search ?>" />
					<input type="submit" id="searchSubmit" class="big-button" value="Search" />
				</form>
			</div>
			
			<div id="content-head-footer"></div>
			
</div>

<div id="content">

<?php

$search = strtolower($search);
$where = "(LOWER(adminName) LIKE '%" . $search . "%') ";

$magicasts = DB::search(
	array(
		"class" => "Magicast", 
		"page" => $page, 
		"per_page" => $per_page, 
		"order_by" => "adminName, id", 
		"where" => $where
));

function stats($magicast) {
	return "<a class='list-action' href='../counterGraph/index.php?id=^Magicast.get_" . $magicast->id . "$|^Magicast.nodeChanged_" . $magicast->id . "_'>stats</a>";
}
function edit($magicast) {
	return "<a class='list-action' id='edit-magicast' href='save.php?id=" . $magicast->id . "'>edit</a>";
}
printListTable(
	array(
		array("header" => "id", "key" => "id"),
		array("header" => "adminName", "key" => "adminName"),
		array("header" => "actions", "functions" => array("stats", "edit")),
	),
	$magicasts
);

$count = DB::count(
	array(
		"class" => "Magicast", 
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

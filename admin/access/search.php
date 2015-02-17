<?
	require_once("../core.php");

	$page = isset($_REQUEST['page']) ? 0 + $_REQUEST['page'] : 0;
	$per_page = 100;
	
	$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : "";

	$HTML_title = "Access / search / " . $search;
	
	include("../header.php");
?>
<div id="content-head">
		
			<div id="content-head-left">
				<h1>Search Access</h1>
			</div>
			
			<div id="content-head-right">
				<form id="search" method="get" action="search.php">
					<input type="text" name="search" class="search-field" value="<?= $search ?>" />
					<input type="submit" id="searchSubmit" class="big-button" value="Search" />
				</form>
			</div>
			
			<div id="content-head-footer"></div>
			
</div>

<div id="content">

<?

$search = strtolower($search);
$where = "(LOWER(adminName) LIKE '%" . $search . "%') ";

$accesses = DB::search(
	array(
		"class" => "Access", 
		"page" => $page, 
		"per_page" => $per_page, 
		"order_by" => "adminName, id", 
		"where" => $where
));

function edit($access) {
	return "<a href='save.php?id=" . $access->id . "'>[edit]</a>";
}
printListTable(
	array(
		array("header" => "id", "key" => "id"),
		array("header" => "adminName", "key" => "adminName"),
		array("header" => "", "functions" => array("edit"))
	),
	$accesses
);

$count = DB::count(
	array(
		"class" => "Access", 
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
<?
	include("../footer.php");

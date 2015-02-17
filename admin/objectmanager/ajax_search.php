<?
	require_once("../core.php");
	$class = $_REQUEST['class'];
	$page = isset($_REQUEST['page']) ? 0 + $_REQUEST['page'] : 0;
	$per_page = 20;
	$search = isset($_REQUEST['search']) ? "" . $_REQUEST['search'] : "";
?>
<fieldset class="grouping">
<legend><?= $class ?> search</legend>
<form>
	<input type="text" class="normal_text" id="search" value="<?= $search ?>" />
	<input type="button" id="searchSubmit" class="small-button" value="Search" />
</form>
<?
$search = strtolower($search);
$where = "(LOWER(adminName) LIKE '%" . $search  . "%')";
$objects = DB::search(
	array(
		"class" => $class, 
		"page" => $page, 
		"per_page" => $per_page, 
		"order_by" => "adminName, id", 
		"where" => $where
));
function select($object) {
	// will be activated in jquery.objectmanager.js
	return "<a class='select' objectId='" . $object->id . "'>Select</a>";
}
printListTable(
	array(
		array("header" => "ID", "key" => "id"),
		array("header" => "adminName", "key" => "adminName"),
		array("header" => "Select", "functions" => array("select"))
	),
	$objects
);
$count = DB::count(
	array(
		"class" => $class, 
		"where" => $where
));	
function pageLink($i) {
	global $search;

	return "search.php?search=" . $search . "&page=" . $i;
}
printPager($page, ceil($count / $per_page), "pageLink");
?>
</fieldset>
<script type="text/javascript">
	$(function() {
		// Focus
		$('input#search').focus();
		// Keyboard shortcuts
		$('input#search').bind('keydown', 'return', function() {
			$('input#searchSubmit').trigger('click');
			return false;
		});
	});
</script>
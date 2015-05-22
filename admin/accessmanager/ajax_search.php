<?php
	require_once("../core.php");
	$page = isset($_REQUEST['page']) ? 0 + $_REQUEST['page'] : 0;
	$per_page = 20;
	
	$search = isset($_REQUEST['search']) ? "" . $_REQUEST['search'] : "";
?>
<fieldset class="grouping">

<legend>Search access</legend>

<form id="accessSearch">
	<input type="text" class="normal_text" id="search" value="<?php echo $search ?>" />
	<input type="button" id="searchSubmit" value="Search" class="small-button" />
</form>

<?php
	if ($page != -1) {

		$where = "adminName LIKE '%" . $search  . "%'";
		$accesses = DB::search(
			array(
				"class" => "Access", 
				"page" => $page, 
				"per_page" => $per_page, 
				"order_by" => "adminName, id", 
				"where" => $where
		));
		function select($access) {
			// will be activated in jquery.accessmanage.js
			return "<a class='select' accessId='" . $access->id . "'>Select access</a>";
		}
		printListTable(
			array(
				array("header" => "ID", "key" => "id"),
				array("header" => "Access Name", "key" => "adminName"),
				array("header" => "Select", "functions" => array("select"))
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
	}
?>
</fieldset>

<script type="text/javascript">		
$(function() {
	$('input#search').bind('keydown', 'return', function() {
		$('input#searchSubmit').trigger('click');
		return false;
	});
});
</script>
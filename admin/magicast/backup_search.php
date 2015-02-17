<?
	require_once("../core.php");
	$page = isset($_REQUEST['page']) ? 0 + $_REQUEST['page'] : 0;
	$per_page = 15;
	
	$mId = isset($_REQUEST['magicastId']) ? 0 + $_REQUEST['magicastId'] : 0;
?>
<fieldset class="grouping">

<legend>Select an older version</legend>

<?
	if ($page != -1) {

		$where = "magicastId LIKE '%" . $mId  . "%'";
		$magicasts = DB::search(
			array(
				"class" => "MagicastBackup", 
				"page" => $page, 
				"per_page" => $per_page, 
				"order_by" => "stamp DESC", 
				"where" => $where
		));
		function select($magicast) {
			return "<a class='magicastSelect' magicastId='" . $magicast->id . "'>Load Magicast</a>";
		}

		function magicastDate($magicast) {
			return date("d.m.Y H:i:s", strtotime($magicast->stamp));
		}
		
		printListTable(
			array(
				array("header" => "ID", "key" => "id"),
				array("header" => "Timestamp", "functions" => array("magicastDate")),
				array("header" => "adminName", "key" => "adminName"),
				array("header" => "Select", "functions" => array("select"))
			),
			$magicasts
		);
		$count = DB::count(
			array(
				"class" => "MagicastBackup", 
				"where" => $where
		));
		function pageLink($i) {
			return "search.php?page=" . $i;
		}
		printPager($page, ceil($count / $per_page), "pageLink");
	}
?>
</fieldset>
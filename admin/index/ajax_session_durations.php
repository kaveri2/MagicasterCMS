<?php
	require_once("../core.php");
?>
<?
	$sql = "SELECT UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(created) AS time FROM " . DB::$table_prefix . "session WHERE updated > NOW() - INTERVAL 2 MINUTE";
	$result = mysql_query($sql);
	$counters = array();
	$total = 0;
	
	while ($row = mysql_fetch_assoc($result)) {
	
		$time = $row["time"];
		if ($time<3600) {
			$s = "0 hours";
			$sub = "" . (round($time / 600) * 10) . " minutes";
		} else if ($time > 3600 * 24) {
			$s = "" . round($time / 3600 / 24) . " days";
			$sub = "";
		} else {
			$s = "" . round($time / 3600) . " hours";
			$sub = "";
		}

		if (empty($counters[$s])) $counters[$s] = array("count" => 0, "sub" => array());
		$counters[$s]["count"] = $counters[$s]["count"] + 1;
		if (empty($counters[$s]["sub"][$sub])) $counters[$s]["sub"][$sub] = 0;
		$counters[$s]["sub"][$sub] = $counters[$s]["sub"][$sub] + 1;
		
		$total = $total + 1;
	}
	
	function cmp($a, $b) {
		if ($a == $b) {
			return 0;
		}
		return ($a > $b) ? -1 : 1;
	}
	uasort($counters, 'cmp');
	
	?>
	<h3>Durations</h3>
	<table id="stats-cities">
<?php
	foreach ($counters as $key => $a) {
		$p = round($a["count"] / $total * 100, 1);
		$useSub = false;
		$sub1 = "";
		$sub2 = "";
		uasort($a["sub"], 'cmp');
		foreach ($a["sub"] as $sub_key => $sub_a) {
			if ($sub_key != '') $useSub = true;
			$sub1 = $sub1 . '<li>' . $sub_key . ':</li>';
			$sub2 = $sub2 . '<li><span class="accent">' . round(((0 + $sub_a) / $a["count"]) * 100, 1)  . ' %</span> (' . $sub_a . ')</li>';
		}
		$sub1 = '<ul>' . $sub1 . '</ul>';
		$sub2 = '<ul>' . $sub2 . '</ul>';
		if (!$useSub) {
			$sub1 = "";
			$sub2 = "";
		}
?>
	<tr>
		<td style="vertical-align: top;"><h4><?= $key ?>:</h4><?= $sub1 ?></td>
		<td style="vertical-align: top;"><h4><span class="accent"><?= $p ?> %</span> (<?= $a["count"] ?>)</h4><?= $sub2 ?></td>
	</tr>
<?
	}
?>
</table>
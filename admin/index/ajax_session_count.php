<?php
	require_once("../core.php");

	$q 		= "SELECT COUNT(*) FROM " . DB::$table_prefix . "session WHERE updated > NOW() - INTERVAL 2 MINUTE";
	$r 		= DB::mysql_query($q);
	$row 	= mysql_fetch_row($r);	
?>
<h3>Total sessions</h3>
<p>
	<span class="accent"><?= $row[0] ?></span>
</p>
<?
	$sql = "SELECT COUNT(*) as c, name FROM " . DB::$table_prefix . "session AS t1 LEFT JOIN " . DB::$table_prefix . "client AS t2 ON (t1.clientId=t2.id) WHERE updated > NOW() - INTERVAL 2 MINUTE GROUP BY name";
	$result = mysql_query($sql);
	$counters = array();
	$total = 0;
	
	while ($row = mysql_fetch_assoc($result)) {
	
		$s = "" . $row['name'];
		if (!$s) $s = "N/A";
		$sub = "";
		$c = 0 + $row['c'];

		if (empty($counters[$s])) $counters[$s] = array("count" => 0, "sub" => array());
		$counters[$s]["count"] = $counters[$s]["count"] + $c;
		if (empty($counters[$s]["sub"][$sub])) $counters[$s]["sub"][$sub] = 0;
		$counters[$s]["sub"][$sub] = $counters[$s]["sub"][$sub] + $c;
		
		$total = $total + $c;
	}
	
	function cmp($a, $b) {
		if ($a == $b) {
			return 0;
		}
		return ($a > $b) ? -1 : 1;
	}
	uasort($counters, 'cmp');
	
	?>
	<h3>Clients</h3>
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

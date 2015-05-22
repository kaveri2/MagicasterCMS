<?php
	require_once("../core.php");
	require_once("../geoip/geoip.inc");
	require_once("../geoip/geoipcity.inc");
?>
<h3>Countries and cities</h3>
<?php
	if (file_exists("../geoip/GeoIPCity.dat")) {
		$gi = geoip_open("../geoip/GeoIPCity.dat", GEOIP_STANDARD);
	} else {
		exit();
	}

	$sql = "SELECT ip FROM " . DB::$table_prefix . "session WHERE updated > NOW() - INTERVAL 2 MINUTE";
	$result = mysqli_query($sql);
	$counters = array();
	$total = 0;
	
	while ($row = mysqli_fetch_assoc($result)) {
		$ip = $row['ip'];
		$record = geoip_record_by_addr($gi, $ip);
		$s = "" . $record->country_name != "" ? utf8_encode($record->country_name) : "N/A";
		$sub = "" . $record->city != "" ? utf8_encode($record->city) : "N/A";

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
		<td style="vertical-align: top;"><h4><?php echo $key ?>:</h4><?php echo $sub1 ?></td>
		<td style="vertical-align: top;"><h4><span class="accent"><?php echo $p ?> %</span> (<?php echo $a["count"] ?>)</h4><?php echo $sub2 ?></td>
	</tr>
<?php
	}
?>
</table>

<?php
	require_once("../core.php");
	require_once("../php-ofc-library/open-flash-chart.php");

	$colors = array(
		"#cc0000","#0000cc","#00cc00","#cc00cc","#00cccc","#cccc00","#cccccc","#cc0066","#00cc66","#cc6600","#6600cc","#0066cc","#66cc00",
		"#660000","#000066","#006600","#660066","#006666","#666600","#666666","#660033","#006633","#663300","#330066","#003366","#336600"
	);
	
	$sql = "SELECT value, stamp, name FROM " . DB::$table_prefix . "sessionCount AS t1 LEFT JOIN " . DB::$table_prefix . "client AS t2 ON (t1.clientId = t2.id) WHERE stamp > NOW() - INTERVAL 7 DAY AND stamp < NOW() - INTERVAL 0 DAY ORDER BY stamp";
	$result = DB::mysql_query($sql);
	
	$max_val = 0;
	$min_s = 0;
	$max_s = time();
	
	$a = array();
	$totals = array();
	
	$lastStamp = 0;
	while($row = mysql_fetch_object($result)) {
		if (!$row->name) $row->name = "N/A";
		$v = 0 + $row->value;
		$s = strtotime($row->stamp);
		if (!isset($a[$row->name])) $a[$row->name] = array();
		$a[$row->name][] = new scatter_value($s, $v);
		$lastStamp = $s;
		if (!isset($totals[$s])) $totals[$s] = 0;
		$totals[$s] = $totals[$s] + $v;
	}
	
	$a['total'] = array();
	if (count($totals)==0) {
		$a['total'][] = new scatter_value($max_s, 0);
	} else {
		foreach ($totals as $s => $v) {
			if (!$min_s || $s<$min_s) $min_s = $s;
			if (!$max_s || $s>$max_s) $max_s = $s;
			if ($v>$max_val) $max_val = $v;
			$a['total'][] = new scatter_value($s, $v);
		}
	}

	$interval_length = 60;	

	if ($min_s == 0 || $min_s == $max_s) {
		$min_s = $max_s - $interval_length;
	}
	
	$chart = new open_flash_chart();
	
	$y = new y_axis();
	$y->set_range(0, max(ceil($max_val / 10) * 11, 1)); 
	$y->set_steps(intval($max_val / 10));
	$chart->set_y_axis($y);

	$x = new x_axis();
	$x->set_range($min_s, $max_s);
	$labels = new x_axis_labels();
	$labels->text('#date:H:i#');
	$labels->visible_steps(10);
	$x->set_labels($labels);
	$chart->set_x_axis( $x );
	
	$i = 0;
	foreach ($a as $key => $value) {
		if (count($value)) {
			$dot = new dot();
			$dot->tooltip('#key#: #val#<br>#date:d.m.Y H:i:s#');
			
			$line = new line();
			$line->set_colour($colors[$i]);
			$line->set_default_dot_style($dot);
			$line->set_values($value);
			$chart->add_element($line);
			$line->set_key('' . $key . '', 10);
			
			$i++;
		}
	}

	echo $chart->toPrettyString();

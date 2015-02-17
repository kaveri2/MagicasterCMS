<?php
	require_once("../core.php");
	require_once("../php-ofc-library/open-flash-chart.php");

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
	$clientIds = isset($_REQUEST['clientIds']) ? $_REQUEST['clientIds'] : array(0);
	$in_clientIds = "'" . implode("','", $clientIds) . "'";

	$table_name = DB::$table_prefix . "counterGraphNode";
	$table_name2 = DB::$table_prefix . "counter";
	
	$colors_cumu = array("#aa0000","#0000aa","#00aa00","#aa00aa","#00aaaa","#aaaa00","#aaaaaa","#aa0099","#00aa99","#aa9900","#9900aa","#0099aa","#99aa00");
	$colors_diff = array("#660000","#000066","#006600","#660066","#006666","#666600","#666666","#660033","#006633","#663300","#330066","#003366","#336600");
	
	// counter ids
	$sql = "SELECT DISTINCT (id) AS id FROM " . $table_name . " WHERE id REGEXP '" . DB::mysql_real_escape_string($id) . "' AND clientId IN ($in_clientIds)";
	
	$result = DB::mysql_query($sql);
	$ids = array();
	while ($row = mysql_fetch_assoc($result)) { 
		$ids[] = $row['id'];
	}
	$in_ids = "'" . implode("','", $ids) . "'";

	// create array for all intervals
	$intervals = array();		
	$intervals[-1] = array();	

	// no counterGraphNodes available!
	if (count($ids)==0) {
	
		$start = time();
		$end = $start + 1;
		$interval_length = 1;
	
		$sql = "SELECT DISTINCT (id) AS id FROM " . $table_name2 . " WHERE id REGEXP '" . DB::mysql_real_escape_string($id) . "' AND clientId IN ($in_clientIds)";
		
		$result = DB::mysql_query($sql);
		while ($row = mysql_fetch_assoc($result)) { 
			$ids[] = $row['id'];
		}
		$in_ids = "'" . implode("','", $ids) . "'";

		$sql = "
			SELECT
				id,
				clientId,
				value,
				updated
			FROM
				" . $table_name2 . " 
			WHERE 
				id IN ($in_ids) AND clientId IN ($in_clientIds)
			GROUP BY
				id, clientId";

		$result = DB::mysql_query($sql);
		while ($row = mysql_fetch_assoc($result)) {
			if (!isset($intervals[-1][$row['id']])) {
				$intervals[-1][$row['id']] = array();
			}
			$intervals[-1][$row['id']]["clientId_" . $row['clientId']] = $row['value'];
		}

		foreach ($intervals[-1] as $id => &$interval) {
			$interval['id'] = $id;
			$interval['s'] = date('d.m. h:i', $start);	
			$interval['max_value'] = 0;
			foreach ($clientIds as $clientId) {
				$interval['max_value'] = $interval['max_value'] + (isset($interval["clientId_" . $clientId]) ? $interval["clientId_" . $clientId] : 0);
			}
			$interval['interpolated_value'] = $interval['max_value'];
		}

		$intervals[$start] = &$intervals[-1];
						
	} else {
	
		// stamp min & max
		$sql = "SELECT MIN(stamp) as stamp_min, MAX(stamp) as stamp_max FROM " . $table_name . " WHERE id IN ($in_ids) AND clientId IN ($in_clientIds)";
		$result = DB::mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		$stamp_min = strtotime($row['stamp_min']);
		$stamp_max = strtotime($row['stamp_max']);
			
		// get the timespan, or create it automatically
		$start = isset($_GET['start']) && $_GET['start']!=""  ? strtotime($_GET['start']) : ($stamp_min);
		$end = isset($_GET['end']) && $_GET['end']!="" ? strtotime($_GET['end']) : ($stamp_max);

		// get the interval length, or create it automatically
		$interval_length = isset($_GET['interval']) && $_GET['interval']!="" ? (0 + $_GET['interval']) : intval(($end - $start) / 40);

		// KIKKA 1: minimiss‰‰n yhden sekunnin aikav‰li
		if ($end - $start < 1) {
			$end = $start + 1;
			$interval_length = 1;
		}
			
		// KIKKA 2: get the starting values for the graphs
		$sql = "
			SELECT
				id,
				clientId,
				MIN(value) AS min_value,
				MIN(UNIX_TIMESTAMP(stamp)) as min_stamp
			FROM
				" . $table_name . " 
			WHERE 
				id IN ($in_ids) AND clientId IN ($in_clientIds) AND UNIX_TIMESTAMP(stamp) >= " . $start . "
			GROUP BY
				id, clientId";

		$result = DB::mysql_query($sql);
		while ($row = mysql_fetch_assoc($result)) {
			if (!isset($intervals[-1][$row['id']])) {
				$intervals[-1][$row['id']] = array();
			}
			$intervals[-1][$row['id']]["clientId_" . $row['clientId']] = $row['min_value'];
		}
					
		$sql = "
			SELECT
				id,
				clientId,
				MAX(value) AS max_value,
				MAX(UNIX_TIMESTAMP(stamp)) as max_stamp
			FROM
				" . $table_name . " 
			WHERE 
				id IN ($in_ids) AND clientId IN ($in_clientIds) AND UNIX_TIMESTAMP(stamp) <= " . $start . "
			GROUP BY
				id, clientId";

		$result = DB::mysql_query($sql);
		while ($row = mysql_fetch_assoc($result)) {
			if (!isset($intervals[-1][$row['id']])) {
				$intervals[-1][$row['id']] = array();
			}
			$intervals[-1][$row['id']]["clientId_" . $row['clientId']] = $row['max_value'];
		}
		
		foreach ($intervals[-1] as $id => &$interval) {
			$interval['id'] = $id;
			$interval['s'] = date('d.m. h:i', $start);	
			$interval['max_value'] = 0;
			foreach ($clientIds as $clientId) {
				$interval['max_value'] = $interval['max_value'] + (isset($interval["clientId_" . $clientId]) ? $interval["clientId_" . $clientId] : 0);
			}
			$interval['interpolated_value'] = $interval['max_value'];
		}

		while ($start <= $end) {

			$sql = "
				SELECT
					id,
					clientId,
					MAX(value) AS max_value,
					MAX(UNIX_TIMESTAMP(stamp)) as max_stamp
				FROM
					" . $table_name . " 
				WHERE 
					id IN ($in_ids) AND clientId IN ($in_clientIds) AND UNIX_TIMESTAMP(stamp) <= " . $start . "
				GROUP BY
					id, clientId";
					
			$result = DB::mysql_query($sql);
			
			while ($row = mysql_fetch_assoc($result)) {
				if (!isset($intervals[$start])) {
					$intervals[$start] = array();
				}
				if (!isset($intervals[$start][$row['id']])) {
					$intervals[$start][$row['id']] = array();
				}
				$intervals[$start][$row['id']]["clientId_" . $row['clientId']] = $row['max_value'];
			}

			foreach ($intervals[$start] as $id => &$interval) {
				$interval['id'] = $id;
				$interval['s'] = date('d.m. h:i', $start);	
				$interval['max_value'] = 0;
				foreach ($clientIds as $clientId) {
					$interval['max_value'] = $interval['max_value'] + 
						(isset($interval["clientId_" . $clientId]) ? 
							$interval["clientId_" . $clientId] : 
								(isset($intervals[-1][$id]["clientId_" . $clientId]) ?
									$intervals[-1][$id]["clientId_" . $clientId] : 0));
				}
			}			
			
			$start = $start + $interval_length;
		}
	}
	
	$interval_count = count($intervals) - 1; // remove starting value
	
	$prev_intervals = array();
	foreach ($ids as $id) {
		$prev_intervals[$id] = array();
		$prev_intervals[$id]['max_value'] = 0;
		$prev_intervals[$id]['max_stamp'] = 0;
		$prev_intervals[$id]['s'] = 0;
	}
	
	// calculate differences (and maximum difference)
	$min_s = null;
	$max_s = null;
	$max_diff = 0;
	$max_cumu = 0;
	$values_diff = array();
	foreach ($ids as $id) {
		$values_diff[$id] = array();
	}
	$values_cumu = array();
	foreach ($ids as $id) {
		$values_cumu[$id] = array();
	}
	foreach ($intervals as $stamp => &$interval) {
		foreach ($interval as $id => &$a) {
								
			// KIKKA 2: remove starting values from calculations
			if ($stamp!==-1) {			
				$a['interpolated_value'] = $a['max_value']; // this will be overwritten, except for the last
				/*
				$weight1 = strtotime($prev_intervals[$id]['s']) - strtotime($prev_intervals[$id]['max_stamp']);
				$weight2 = strtotime($a['min_stamp']) - strtotime($prev_intervals[$id]['s']);
				if ($weight1 + $weight2 != 0) {
					$prev_intervals[$id]['interpolated_count'] = floor(($prev_intervals[$id]['max_count'] * $weight2 + $a['min_count'] * $weight1) / ($weight1 + $weight2));
				} else {
					$prev_intervals[$id]['interpolated_count'] = $a['min_count'];
				}
				/*
				echo($prev_intervals[$id]['interpolated_count'] . " = " . $prev_intervals[$id]['max_count'] . " @ " .  $prev_intervals[$id]['max_stamp'] . " -> " . $a['min_count'] . " @ " .  $a['min_stamp'] . " @ " . $prev_intervals[$id]['s']);
				echo("\n");
				/**/
			}
			
			$prev_intervals[$id] = &$a;
		}
	}
	
	$prev_intervals = array();
	foreach ($ids as $id) {
		$prev_intervals[$id] = array();
		$prev_intervals[$id]['interpolated_value'] = 0;
	}	
	
	foreach ($intervals as $stamp => &$interval) {
	
		foreach ($ids as $id) {		
		
			if (empty($interval[$id])) {
			
				if ($stamp!=-1 && $prev_intervals[$id]['interpolated_value']) {
					$values_diff[$id][] = new scatter_value($stamp, 0);
					$values_cumu[$id][] = new scatter_value($stamp, $prev_intervals[$id]['interpolated_value']);
				}
				
			} else {
			
				$a = &$interval[$id];

				if ($stamp!=-1) {
					$diff = $a['interpolated_value'] - $prev_intervals[$id]['interpolated_value'];
					if ($diff>$max_diff) $max_diff = $diff;
					$values_diff[$id][] = new scatter_value($stamp, $diff);
								
					$cumu = $a['interpolated_value'];
					if ($cumu>$max_cumu) $max_cumu = $cumu;
					$values_cumu[$id][] = new scatter_value($stamp, $cumu);
					
					if ($max_s===null || $stamp>$max_s) $max_s = $stamp;
					if ($min_s===null || $stamp<$min_s) $min_s = $stamp;
					
					// KIKKA 3: open flash chart crashes if only one value
					if ($interval_count == 1) {
						$values_diff[$id][] = new scatter_value($stamp + 1, $diff);
						$values_cumu[$id][] = new scatter_value($stamp + 1, $cumu);
						$max_s = $max_s + 1;
					}											
				}

				$prev_intervals[$id] = &$a;
			}
		}
		
	}	
		
//	var_dump($intervals);
//	exit();
		
	$chart = new open_flash_chart();
	$chart->set_title( new title( $id ) );

	$y1 = new y_axis();
	$y1->set_range(0,  ceil($max_diff / 20) * 21); 
	$y1->set_steps(intval($max_diff / 20));
	$chart->set_y_axis($y1);

	$y2 = new y_axis_right();
	$y2->set_range(0, ceil($max_cumu / 20) * 21);
	$y2->set_steps(intval($max_cumu / 20));
	$chart->set_y_axis_right($y2);
	
	$x = new x_axis();
	$x->set_range($min_s, $max_s);
	$x->set_steps($interval_length);
	$labels = new x_axis_labels();
	$labels->text('#date:d.m.Y H:i:s#');
	$labels->set_steps($interval_length);
	$labels->visible_steps(ceil(intval(($max_s - $min_s) / $interval_length) / 20));
	$labels->rotate(45);
	$x->set_labels($labels);	
	$chart->set_x_axis( $x );

	$tmp = $interval_length;
	$interval_string = "";
	$days = intval($tmp / 24 / 3600);
	$tmp = $tmp - $days * 24 * 3600;
	if ($days) $interval_string .= $days . " day(s) ";
	$hours = intval($tmp / 3600);
	$tmp = $tmp - $hours * 3600;
	if ($days || $hours) $interval_string .= $hours . " hour(s) ";
	$mins = intval($tmp / 60);
	$tmp = $tmp - $mins * 60;
	if ($days || $hours || $mins) $interval_string .= $mins . " min(s) ";
	$secs = $tmp;
	if ($days || $hours || $mins || $secs) $interval_string .= $secs . " sec(s)";
	
	$x_legend = new x_legend( 'Interval: ' . $interval_string );
	$x_legend->set_style( '{font-size: 20px; color: #778877}' );
	$chart->set_x_legend( $x_legend );
	
	$i = 0;		
	foreach ($ids as $id) {
		$cumu_dot = new dot();
		$cumu_dot->tooltip('(C) #key#: #val#<br>#date:d.m.Y H:i:s#');

		$cumu = new area();
		$cumu->set_default_dot_style($cumu_dot);
		$cumu->set_colour($colors_cumu[$i]);
		$cumu->line_style( new line_style(5, 5) );
		$cumu->set_width(1);
		$cumu->set_fill_colour($colors_cumu[$i]);
		$cumu->set_fill_alpha(0.05);
		$cumu->set_values($values_cumu[$id]);
		$cumu->set_key('' . $id . '', 10);
		$cumu->attach_to_right_y_axis();
		$chart->add_element($cumu);
		
		$i = ++$i % count($colors_cumu);
	}
	
	$i = 0;
	foreach ($ids as $id) {
		$diff_dot = new dot();
		$diff_dot->tooltip('(D) #key#: #val#<br>#date:d.m.Y H:i:s#');
		
		$diff = new line();
		$diff->set_default_dot_style($diff_dot);
		$diff->set_colour($colors_diff[$i]);
		$diff->set_width(2);
		$diff->set_values($values_diff[$id]);
		$diff->set_key('' . $id . '', 10);
		$chart->add_element($diff);
		
		$i = ++$i % count($colors_diff);
	}

	echo $chart->toPrettyString();

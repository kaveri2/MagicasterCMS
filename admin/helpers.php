<?php

define('PS_DELIMITER', '|');
define('PS_UNDEF_MARKER', '!');

function session_real_decode($str)
{
	$str = (string)$str;

	$endptr = strlen($str);
	$p = 0;

	$serialized = '';
	$items = 0;
	$level = 0;

	while ($p < $endptr) {
		$q = $p;
		while ($str[$q] != PS_DELIMITER)
			if (++$q >= $endptr) break 2;

		if ($str[$p] == PS_UNDEF_MARKER) {
			$p++;
			$has_value = false;
		} else {
			$has_value = true;
		}
		
		$name = substr($str, $p, $q - $p);
		$q++;

		$serialized .= 's:' . strlen($name) . ':"' . $name . '";';
		
		if ($has_value) {
			for (;;) {
				$p = $q;
				switch ($str[$q]) {
					case 'N': /* null */
					case 'b': /* boolean */
					case 'i': /* integer */
					case 'd': /* decimal */
						do $q++;
						while ( ($q < $endptr) && ($str[$q] != ';') );
						$q++;
						$serialized .= substr($str, $p, $q - $p);
						if ($level == 0) break 2;
						break;
					case 'R': /* reference  */
						$q+= 2;
						for ($id = ''; ($q < $endptr) && ($str[$q] != ';'); $q++) $id .= $str[$q];
						$q++;
						$serialized .= 'R:' . ($id + 1) . ';'; /* increment pointer because of outer array */
						if ($level == 0) break 2;
						break;
					case 's': /* string */
						$q+=2;
						for ($length=''; ($q < $endptr) && ($str[$q] != ':'); $q++) $length .= $str[$q];
						$q+=2;
						$q+= (int)$length + 2;
						$serialized .= substr($str, $p, $q - $p);
						if ($level == 0) break 2;
						break;
					case 'a': /* array */
					case 'O': /* object */
						do $q++;
						while ( ($q < $endptr) && ($str[$q] != '{') );
						$q++;
						$level++;
						$serialized .= substr($str, $p, $q - $p);
						break;
					case '}': /* end of array|object */
						$q++;
						$serialized .= substr($str, $p, $q - $p);
						if (--$level == 0) break 2;
						break;
					default:
						return false;
				}
			}
		} else {
			$serialized .= 'N;';
			$q+= 2;
		}
		$items++;
		$p = $q;
	}
	return @unserialize( 'a:' . $items . ':{' . $serialized . '}' );
}

function printListTable($columns, $rows, $parameters = null)
{
	$s = "<table class='list'>";
	$s .= "<thead>";
	$s .= "<tr>";	
	foreach($columns as $column)
	{
		$s .= "<th id='th-" . $column['header'] . "'>" . $column['header'] . "</td>";
	}				
	$s .= "</tr>";
	$s .= "</thead>";
	$s .= "<tbody>";
	foreach($rows as $row)
	{
		$s .= "<tr>";		
		foreach($columns as $column)
		{
			if (isset($column['functions'])) {
				$html = null;
				foreach($column['functions'] as $function) {
					$html .= $function($row);
				}
				$s .= "<td class=\"list-actions\">" . $html . "</td>";	
			} else {
				$html = htmlspecialchars($row->$column['key']);	
				$s .= "<td>" . $html . "</td>";	
			}
							
		}
		$s .= "</tr>";				
	}
	$s .= "</tobdy>";
	$s .= "</table>";
	print $s;
}	

function printPager($page, $pages, $f)
{
	$s = '<div id="paging">';	
	if($pages > 0)
	{
		for($i = 0; $i < $pages; $i++)
		{
			if ($i == $page) { 
				$li_class = "link_pager small-button paging-current"; 
			} else { 
				$li_class = "link_pager small-button"; 
			}
			
			$s .= '<a page="'.$i.'" class="' . $li_class . '" href="' . $f($i)  . '">' . ($i + 1) . '</a>';
		}
	}
	$s .= "</div>";

	print $s;
}
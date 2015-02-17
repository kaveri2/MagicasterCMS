<?
	function public_Path_search($xml) {

		$name = "" . $xml->name;
		$name = DB::mysql_real_escape_string($name);
		
		$_SESSION['path'] = $name;

		Core::addCounter("Path.search_" . $name);

		$paths = DB::search(
			array(
				"class" => "Path",
				"order_by" => "weight DESC",
				"accessSession" => Core::$session,
				"where" => "'$name' REGEXP search",
				"limit" => "1"
			)
		);
		
		if (!count($paths)) {
			return "";
		}
		
		$s = Core::toXMLString("", $paths[0], 
			array(
				"Path" => array("id", "data")
			)
		);

		return Core::processXMLString($s);
	}
		


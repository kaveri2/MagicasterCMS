<?php
class DB
{
	public static $table_prefix = "";
	public static $mc_key_prefix = "";
	
	public static $connection = null;
	public static $mc = null;
	
	public static $debug = false;
	public static $debugOutput = "";
			
	public static function getTableName($obj) {
		$className = get_class($obj);
		eval("\$var = $className::\$table_name;");
		return DB::$table_prefix . $var;
	}

	public static function getTableIdType($obj) {
		$className = get_class($obj);
		eval("\$var = $className::\$table_id_type;");
		return $var;
	}

	public static function getTableColumns($obj) {
		$className = get_class($obj);
		eval("\$var = $className::\$table_columns;");
		return $var;
	}
		
	public static function mysqli_query($sql) {
		if (DB::$debug) {
			$start = microtime(true);
		}
		$result = mysqli_query(DB::$connection, $sql);
		if (DB::$debug) {
			$time = microtime(true) - $start;
			DB::$debugOutput = DB::$debugOutput . "SQL: \"$sql\" in $time s\n";
		}
		return $result;
	}	

	public static function mysqli_affected_rows() {
		return mysqli_affected_rows(DB::$connection);
	}	

	public static function mysqli_insert_id() {
		return mysqli_insert_id(DB::$connection);
	}	

	public static function mysqli_real_escape_string($s) {
		return mysqli_real_escape_string(DB::$connection, $s);
	}	
	
	/* Tools */
	
	public static function delete($obj)
	{
		if (DB::getTableIdType($obj)=="string") {
			$id = "\"" . DB::mysqli_real_escape_string($obj->id) . "\"";
		} else {
			$id	= (0 + $obj->id);
		}	
		$sql = "DELETE FROM " . DB::getTableName($obj) . " WHERE id = " . $id;
		DB::mysqli_query($sql);
		if (DB::$mc) {
			DB::$mc->delete(DB::$mc_key_prefix . DB::getTableName($obj) . "_" . $obj->id);
		}
	}

	public static function load($obj, $row = null)
	{
		if ($obj->id || DB::getTableIdType($obj)=="string" || $row!=null) {
			if (!$row) {
				if (DB::$mc) {
					$row = DB::$mc->get(DB::$mc_key_prefix . DB::getTableName($obj) . "_" . $obj->id);
				}
				if (!$row) {
					if (DB::getTableIdType($obj)=="string") {
						$q = "SELECT * FROM " . DB::getTableName($obj) . " WHERE id = \"" . DB::mysqli_real_escape_string($obj->id) . "\"";					
					} else {
						$q = "SELECT * FROM " . DB::getTableName($obj) . " WHERE id = " . $obj->id;
					}					
					$r 	 = DB::mysqli_query($q);
					$row = mysqli_fetch_object($r);
					if (!$row) { 
						throw new DBNotFoundException();
					}
					if (DB::$mc) {
						if (!DB::$mc->add(DB::$mc_key_prefix . DB::getTableName($obj) . "_" . $obj->id, $row)) {
							// if the memcached was set somewhere during mysql fetch, delete memcached just in case
							DB::$mc->delete(DB::$mc_key_prefix . DB::getTableName($obj) . "_" . $obj->id);
						}
					}
				}
			} else {
				$obj->id = $row->id;
			}
			foreach (DB::getTableColumns($obj) as $column) {	
				if ($row->{$column['column']} != null) {
					if ($column['type'] == "number" || $column['type'] == "boolean" || $column['type'] == "integer" || $column['type'] == "float") { 
						$obj->{$column['property']} = 0 + $row->{$column['column']};
					} else if ($column['type'] == "string") { 
						$obj->{$column['property']} = "" . $row->{$column['column']};
					} else {
						$obj->{$column['property']} = new $column['type'];
						if (DB::getTableIdType($obj->{$column['property']}) == "string") {
							$obj->{$column['property']}->id = "" . $row->{$column['column']};
						} else {
							$obj->{$column['property']}->id = 0 + $row->{$column['column']};
						}
					}
				}
			}
		}
	}
	
	public static function save($obj) 
	{
		if ($obj->id) { 
			DB::update($obj); 
		} else if (DB::getTableIdType($obj)=="integer") { 
			$obj->id = DB::insert($obj);
		} else if (isset($obj->newId)) {
			DB::insert($obj);
		}
		if (isset($obj->newId)) {
			$obj->id = $obj->newId;
			$obj->newId = null;
		}
		if (DB::$mc) {
			DB::$mc->delete(DB::$mc_key_prefix . DB::getTableName($obj) . "_" . $obj->id);
		}
	}
	
	public static function insert($obj)
	{
		$keys 		= "";
		$values		= "";
		//Normal fields

		if (isset($obj->newId)) {
			$keys .= "id, "; 
			if (DB::getTableIdType($obj)=="string") {
				$values .= "\"" . DB::mysqli_real_escape_string($obj->newId) . "\", ";
			} else {
				$values	.= (0 + $obj->newId) . ", ";
			}
		}
		
		foreach(DB::getTableColumns($obj) as $column)
		{				
			if (!$column['readonly']) {
				$keys .= $column['column'] . ", "; 
				$value 	= $obj->{$column['property']};
				if (is_null($value)) {
					$values	.= "NULL, ";			
				} else if ($column['type'] == "number" || $column['type'] == "boolean" || $column['type'] == "integer" || $column['type'] == "float") { 
					$values	.= (0 + $value) . ", "; 
				} else if ($column['type'] == "string") {
					$values	.= "\"" . DB::mysqli_real_escape_string($value) . "\", "; 
				} else {
					if (is_null($value) || is_null($value->id)) {
						$value = "NULL";
					} else if (DB::getTableIdType($value)=="string") {
						$value = "\"" .  DB::mysqli_real_escape_string($value->id) . "\"";
					} else {
						$value = 0 + $value->id;
						if ($value==0) $value = "NULL";
					}
					$values .= $value . ", ";
				}
			}
		}
		
		//Remove extra characters (" ,")
		$keys 	= substr($keys, 0, (strlen($keys) - 2));
		$values = substr($values, 0, (strlen($values) - 2));		
		
		//Make the query
		$q 		= "INSERT INTO " . DB::getTableName($obj) . " (" . $keys . ") VALUES (" . $values . ")";
		$r 		= DB::mysqli_query($q);
		
		return (DB::mysqli_insert_id());
	}
	
	public static function update($obj)
	{
		$q = "UPDATE " . DB::getTableName($obj) . " SET ";

		if (isset($obj->newId)) {
			if (DB::getTableIdType($obj)=="string") {
				$q .= "id = \"" . DB::mysqli_real_escape_string($obj->newId) . "\", ";
			} else {
				$q .= "id = " . (0 + $obj->newId) . ", ";
			}
		}
		
		foreach(DB::getTableColumns($obj) as $column)
		{				
			if (!$column['readonly']) {
				$value 	= $obj->{$column['property']};
				if (is_null($value)) {
					$q .= $column['column'] . " = NULL, ";
				} else if ($column['type'] == "number" || $column['type'] == "boolean" || $column['type'] == "integer" || $column['type'] == "float") { 
					$q .= $column['column'] . " = " . (0 + $value) . ", ";
				} else if ($column['type'] == "string") {
					$q .= $column['column'] . " = \"" . DB::mysqli_real_escape_string($value) . "\", ";		
				} else {
					if (is_null($value) || is_null($value->id)) {
						$value = "NULL";
					} else if (DB::getTableIdType($value)=="string") {
						$value = "\"" .  DB::mysqli_real_escape_string($value->id) . "\"";
					} else {
						$value = 0 + $value->id;
						if ($value==0) $value = "NULL";
					}
					$q .= $column['column'] . " = " . $value . ", ";
				}
			}
		}
		
		$q = substr($q, 0, (strlen($q) - 2));
		
		if (DB::getTableIdType($obj)=="string") {
			$q .= " WHERE id = \"" . DB::mysqli_real_escape_string($obj->id) . "\"";
		} else {
			$q .= " WHERE id = " . (0 + $obj->id);
		}
		$r = DB::mysqli_query($q);
		
		return (DB::mysqli_insert_id());		
	}	
			
	public static function search($params = array())
	{			
		// table
		eval("\$table = " . $params['class'] .  "::\$table_name;");
		$table = DB::$table_prefix . $table;
		
		// select
		$select =  $table . ".*";
		if(isset($params["select"])) { 
			$select = $params["select"];
		}

		// join
		$join = "";
		if(isset($params["join"])) { 
			$join = " " . $params["join"];
		}

		// where
		$where = ""; 
	 	if (isset($params["where"])) { 
			 $where = " WHERE " . $params["where"]; 
		} 

		// group_by
		$group_by = "";
		if(isset($params["group_by"])) { 
			$group_by =  " GROUP BY " . $params["group_by"];
		}

		// order_by
		$order_by = "";
		if(isset($params["order_by"])) { 
			$order_by =  " ORDER BY " . $params["order_by"];
		}
		
		// limit	
		$limit = "";
		if (isset($params["limit"])) {
			$limit = " LIMIT " . $params["limit"];
		} else if (isset($params["page"])) {
			$limit = " LIMIT " . ((0 + $params["page"]) * (0 + $params["per_page"])) . ", " . (0 + $params["per_page"]);
		}		
		
		// join
		if (isset($params['accessSession'])) {
			$accessSessionId = $params['accessSession']->id;
			$select = $select . ", " . DB::$table_prefix . "accessCache.granted AS accessGranted";
			$join = $join . " INNER JOIN " . DB::$table_prefix . "accessCache ON " . DB::$table_prefix . "accessCache.accessId=" . $table . ".accessId AND " . DB::$table_prefix . "accessCache.sessionId=" . $accessSessionId;
		}
		
		if (isset($params["aggregate"])) {
			$select = $params["aggregate"] . " AS a";
		}
		
		$q = "SELECT " . $select . " FROM " . $table . $join . $where . $group_by . $order_by . $limit;
		$r = DB::mysqli_query($q);
		
		if (isset($params["aggregate"])) {
			$o = mysqli_fetch_object($r);
			return $o->a;
		}
				
		$a = array();
		while ($row = mysqli_fetch_object($r)) {		
			$obj 			= new $params["class"];
			$obj->id 		= $row->id;
			DB::load($obj, $row);
			foreach ($row as $key => $value) {
				$obj->{$key} = $value;
			}
			$a[] = $obj;
		}
		return $a;
	}	
	
	public static function count($params)
	{
		$params['aggregate'] = "COUNT(*)";
		return DB::search($params);
	}	

}

class DBException extends Exception {}
class DBNotFoundException extends DBException { }

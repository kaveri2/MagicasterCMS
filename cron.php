<?php

require_once('config/admin.php');

// database
if (!$connection = mysql_connect($CONFIG['db_host'], $CONFIG['db_username'], $CONFIG['db_password'])) throw new Exception("");
if (!mysql_select_db($CONFIG['db_database'], $connection)) throw new Exception("");
mysql_query("SET NAMES 'utf8'", $connection);

DB::$connection = $connection;
DB::$table_prefix = $CONFIG['db_table_prefix'];

// delete old counter graphs
$sql = "DELETE FROM " . DB::$table_prefix . "counterGraphNode WHERE stamp < NOW() - INTERVAL 30 DAY";
$result = mysql_query($sql);

// draw counter graphs
$sql = "SELECT UNIX_TIMESTAMP() - UNIX_TIMESTAMP(MAX(stamp)) AS d FROM " . DB::$table_prefix . "counterGraphNode";
$result = mysql_query($sql);
$diff = -1;
if ($row = mysql_fetch_object($result)) {
	if ($row->d != null) {
		$diff = $row->d;
	}
}
if ($diff==-1 || $diff >= (60 * 15)) { // 15 min interval
	$sql = "INSERT IGNORE INTO " . DB::$table_prefix . "counterGraphNode (id, clientId, value) SELECT id, clientId, value FROM " . DB::$table_prefix . "counter WHERE updated > NOW() - INTERVAL 1 HOUR";
	$result = mysql_query($sql);
}

// delete old session graphs
/*
$sql = "DELETE FROM " . DB::$table_prefix . "sessionCount WHERE stamp < NOW() - INTERVAL 30 DAY";
$result = mysql_query($sql);
*/

// draw session graph
$sql = "SELECT UNIX_TIMESTAMP() - UNIX_TIMESTAMP(MAX(stamp)) AS d from " . DB::$table_prefix . "sessionCount";
$result = DB::mysql_query($sql);
$diff = -1;
if ($row = mysql_fetch_object($result)) {
	$diff = $row->d;
}
if ($diff==-1 || $diff >= (60 * 1)) { // 1 min interval
	$sql = "INSERT INTO " . DB::$table_prefix . "sessionCount (clientId, value) SELECT clientId, COUNT(*) FROM " . DB::$table_prefix . "session WHERE updated > NOW() - INTERVAL 2 MINUTE GROUP BY clientId";
	$result = DB::mysql_query($sql);
}

// delete sessions that are updated over 30 days ago
$sql = "DELETE t1, t2, t3 FROM " . DB::$table_prefix . "session AS t1 LEFT JOIN " . DB::$table_prefix . "accessCache AS t2 ON (t2.sessionId = t1.id) LEFT JOIN " . DB::$table_prefix . "sessionAccess AS t3 ON (t3.sessionId = t1.id) WHERE t1.updated<NOW() - INTERVAL 30 DAY";
$result = DB::mysql_query($sql);

// fix errors
/*
$sql = "DELETE t1 FROM " . DB::$table_prefix . "accessCache AS t1 LEFT JOIN " . DB::$table_prefix . "session AS t2 ON (t1.sessionId=t2.id) WHERE t2.id IS NULL";
$sql = "DELETE t1 FROM " . DB::$table_prefix . "sessionAccess AS t1 LEFT JOIN " . DB::$table_prefix . "session AS t2 ON (t1.sessionId=t2.id) WHERE t2.id IS NULL";
*/
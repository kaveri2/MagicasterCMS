<?php

// fixing magic quotes
if (get_magic_quotes_gpc()) {
    function stripslashes_gpc(&$value) {
        $value = stripslashes($value);
    }
    array_walk_recursive($_GET, 'stripslashes_gpc');
    array_walk_recursive($_POST, 'stripslashes_gpc');
    array_walk_recursive($_COOKIE, 'stripslashes_gpc');
    array_walk_recursive($_REQUEST, 'stripslashes_gpc');
}

$parent_path = dirname(dirname(__FILE__)) . "/";
require_once($parent_path . 'config/admin.php');

if (count($CONFIG['users'])>0 && (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || "" . $_SERVER['PHP_AUTH_USER'] == "" || $CONFIG['users']["" . $_SERVER['PHP_AUTH_USER']]!=$_SERVER["" . 'PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Magicaster"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
} else {
}

if ($CONFIG['debug']) {
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
}

require_once('helpers.php');

if (!$connection = mysqli_connect($CONFIG['db_host'], $CONFIG['db_username'], $CONFIG['db_password'], $CONFIG['db_database'], $CONFIG['db_port'])) throw new Exception("");
mysqli_query($connection, "SET NAMES 'utf8'");

DB::$connection = $connection;
DB::$table_prefix = $CONFIG['db_table_prefix'];

$mc = null;
DB::$mc = $mc;
DB::$mc_key_prefix = $CONFIG['mc_key_prefix'];

DB::$debug = $CONFIG['DB_debug'];

// print output buffer on shutdown
function shutdown()
{
	$s = ob_get_contents();
	ob_end_clean();
	echo $s;
}
register_shutdown_function('shutdown');
ob_start();

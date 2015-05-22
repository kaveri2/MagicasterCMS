<?php

header('Access-Control-Allow-Origin: *');  

require_once("../config/server.php");
require_once("Core.php");

if ($CONFIG['debug']) {
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
}

function createEvent($event, $parameters = "") {
	Core::$output = Core::$output . '<event name="' . $event . '">' . $parameters . '</event>';
}

function exception_handler($e) {
	global $CONFIG;

	header("Content-type: text/xml");
		
	session_write_close();
	ob_end_flush();

	if ($CONFIG['debug']) {
		createEvent("Core.exception", "<![CDATA[" . $e->getMessage() . ": " . $e->getTraceAsString() . "]]>");
	} else {
		createEvent("Core.exception", "");
	}
	
	echo("<?phpxml version='1.0' encoding='UTF-8' ?>\n" . "<response>" . Core::$output . "</response>");
}
set_exception_handler('exception_handler');

function ob_callback($buffer) {
	global $CONFIG;

	if ($buffer && $CONFIG['debug']) {
		createEvent("Core.output", "<![CDATA[" . $buffer . "]]>");
	}
}
ob_start("ob_callback");

if (!$connection = mysqli_connect($CONFIG['db_host'], $CONFIG['db_username'], $CONFIG['db_password'])) throw new Exception("");
if (!mysqli_select_db($CONFIG['db_database'], $connection)) throw new Exception("");
mysqli_query("SET NAMES 'utf8'", $connection);

DB::$connection = $connection;
DB::$table_prefix = $CONFIG['db_table_prefix'];

$mc = null;
if (isset($CONFIG['mc_servers']) && count($CONFIG['mc_servers'])>0) {
	$mc = new Memcache;
	foreach ($CONFIG['mc_servers'] as $server) {
		$mc->addServer($server[0], $server[1]);
	}
}
DB::$mc = $mc;
DB::$mc_key_prefix = $CONFIG['mc_key_prefix'];

DB::$debug = $CONFIG['DB_debug'];

$request = "";
if (isset($_POST['xml'])) {
	$request = $_POST['xml'];
} else if (isset($_GET['xml'])) {
	$request = stripslashes($_GET['xml']);
} else {
	$request = file_get_contents("php://input");
}
$request = new SimpleXMLElement($request);

// session

Core::$session = new Session();
Core::$session->key = "" . $request->sessionKey;
Core::$session->ip = $_SERVER['REMOTE_ADDR'];
Core::$session->userAgent = $_SERVER['HTTP_USER_AGENT'];
if (isset($_COOKIE[$CONFIG['browserCookie_name']])) {
	Core::$session->browserCookie = $_COOKIE[$CONFIG['browserCookie_name']];
} else {
	Core::$session->browserCookie = uniqid("", true);
	setCookie($CONFIG['browserCookie_name'], Core::$session->browserCookie, time() + 60 * 60 * 24 * 365);
}
include("ServerSessionHandler.php");
$handler = new ServerSessionHandler();
//session_set_save_handler($handler, true);
session_set_save_handler(
    array($handler, 'open'),
    array($handler, 'close'),
    array($handler, 'read'),
    array($handler, 'write'),
    array($handler, 'destroy'),
    array($handler, 'GC')
	);
session_start();
if (!isset($_SESSION['accessCache'])) {
	$_SESSION['accessCache'] = array();
}
Core::$session->accessCache = $_SESSION['accessCache'];

function callPublicMethod($method, $parameters) {
	return callMethod("public", $method, $parameters);
}

function callPrivateMethod($method, $parameters) {
	return callMethod("private", $method, $parameters);
}

function callMethod($type, $method, $parameters) {

	$className = "";
	$path = explode (".", $method);
	$c = count($path);
	
	for ($i = 0 ; $i<$c ; $i++) {
		if ($i==0) {
			$className = $path[$i];
		} else if ($i<$c-1) {
			$className .= "_" . $path[$i];
		}
	}
	$functionName = $type . "_" . str_replace(".", "_", $method);
			
	$result = "";
		
	$includeFile = "methods" . "/" . $className . ".php";
	if (file_exists($includeFile)) {
		require_once($includeFile);
		if (function_exists($functionName)) {
			$result = call_user_func($functionName, $parameters);
		} else {
			return "";
		}
	} else {
		return "";
	}
	
	return $result;
}

foreach ($request->children() as $node) {
	if ($node->getName() == 'methodCall') {
		$result = callPublicMethod($node->attributes()->name, $node->children());
		Core::$output = Core::$output . '<methodReturn id="' . $node->attributes()->id . '">'	. $result . '</methodReturn>';
	}
}

foreach ($CONFIG['automatic_privateMethodCalls'] as $method) {
	callPrivateMethod($method, "");
}

if (DB::$debugOutput) {
	createEvent("DB.debugOutput", "<![CDATA[" . DB::$debugOutput . "]]>");
}

$_SESSION['accessCache'] = Core::$session->accessCache;
session_write_close();

header("Content-type: text/xml");
ob_end_flush();
echo("<?phpxml version='1.0' encoding='UTF-8' ?>\n" . "<response>" . Core::$output . "</response>");

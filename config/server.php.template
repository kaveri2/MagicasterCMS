<?
require_once("common.php");

$CONFIG = array_merge($CONFIG, array(

	"browserCookie_name" => "magicaster",
	
	"session_time" => 3600 * 24 * 365,
	"session_cache_time" => 60 * 5,

	"public_Test_disableCheck" => array(
		"secret" => "magicaster"
	),
	
	"updateAccessCache_privateMethodCalls" => array(
		"AccessPublishWindow.calculateAccessCache",
		"Client.calculateAccessCache",
		"Session.calculateAccessCache"
	),

	"automatic_privateMethodCalls" => array(
		"AccessCache.update"
	),
	
	"private_AccessCache_update" => array(
		"interval" => 60
	),

	"public_Application_start" => array(
	)

));

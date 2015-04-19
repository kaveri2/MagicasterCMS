{ "type": "select", "data": { "options": [
	{ "label": "Send analytics", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2015/sendanalytics.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Event", "type": "node", "data": { "name": "event", "content": [
<?
	include("value.php");
?>
			], "delay": true } },
			{ "label": "Label", "type": "node", "data": { "name": "label", "content": [
<?
	include("value.php");
?>
			], "delay": true } },
			{ "label": "Value", "type": "node", "data": { "name": "value", "content": [
<?
	include("value.php");
?>
			], "delay": true } }
		] } }
	] },
	{ "label": "Grant session access", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2015/grantsessionaccess.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "SessionAccess" } ] } },
			{ "label": "Access", "type": "node", "data": { "name": "id", "content": [ { "type": "access" } ] } }
		] } }
	] },
	{ "label": "Send broadcast message", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2015/sendbroadcastmessage.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Channel", "type": "node", "data": { "name": "channel", "content": [ { "type": "text", "data": {"multiline": false } } ] } },
			{ "label": "Data", "type": "node", "data": { "name": "data", "content": [ { "type": "text", "data": {"multiline": true } } ] } }
		] } }
	] },
	{ "label": "Change path", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2015/changepath.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Name", "type": "node", "data": { "name": "name", "content": [
<?
	include("value.php");
?>
			], "delay": true } }
		] } }
	] }
] } }
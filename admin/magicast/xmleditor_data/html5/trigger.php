{ "label": "Require access", "type": "attribute", "data": { "name": "Magicaster_requireAccess", "content": [ { "type": "access" } ] } },
{ "label": "Require not access", "type": "attribute", "data": { "name": "Magicaster_requireNotAccess", "content": [ { "type": "access" } ] } },
{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "hint": { "success": true } } ] } },
{ "label": "Overwrite existing trigger?", "type": "node", "data": { "name": "overwrite", "content": [ { "type": "boolean" } ] } },
{ "label": "Trigger immediately?", "type": "node", "data": { "name": "immediate", "content": [ { "type": "boolean" } ] } },
{ "label": "Triggering events", "type": "list", "data": { "content": [ 
	{ "type": "node", "data": { "name": "event", "content": [ 
<?php
	include("event.php");
?>
	] } }
] } },
{ "label": "Condition", "type": "node", "data": { "name": "condition", "content": [
<?php
	include("value.php");
?>
], "delay": true } },
{ "label": "Actions to run", "type": "list", "data": { "content": [ 
	{ "type": "node", "data": { "name": "action", "content": [ 
		{ "label": "Wait (seconds)", "type": "node", "data": { "name": "wait", "content": [
<?php
	include("value.php");
?>
		] } },
		{ "label": "Condition", "type": "node", "data": { "name": "condition", "content": [
<?php
	include("value.php");
?>
		], "delay": true } },
		{ "type": "select", "data": { "options": [
<?php
foreach ($CONFIG['magicast/xmleditor_data/html5']['action_options'] as $option) {
?>
			{ "label": "<?php echo $option['label'] ?>", "content": [
<?php
	include($option['include_file']);
?>
			] },
<?php
}
?>
			{ "label": "Other", "content": [
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [
<?php
	include("value.php");
?>
				], "delay": true } },
				{ "label": "Parameters", "type": "node", "data": { "name": "parameters", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
			] }
		] } }
	] }, "hint": { "success": true } }
] } }

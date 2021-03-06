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
{ "label": "Conditions", "type": "list", "data": { "content": [ 
	{ "type": "node", "data": { "name": "condition", "content": [ 
		{ "label": "Operator", "type": "node", "data": { "name": "operator", "content": [ { "type": "text", "data": { "options": [
			{ "label": "==", "value": "eq" },
			{ "label": "!=", "value": "ne" },
			{ "label": "&gt;", "value": "gt" },
			{ "label": "&lt;", "value": "lt" },
			{ "label": "IS NULL", "value": "isNull" },
			{ "label": "IS NOT NULL", "value": "isNotNull" }
		] } } ] } },
		{ "label": "Values", "type": "list", "data": { "content": [ 
			{ "type": "node", "data": { "name": "value", "content": [
<?php
	include("value.php");
?>
			] } }
		] } }
	] } }
] } },
{ "label": "Actions to run", "type": "list", "data": { "content": [ 
	{ "type": "node", "data": { "name": "action", "content": [ 
		{ "label": "Wait (seconds)", "type": "node", "data": { "name": "wait", "content": [ { "type": "text" } ] } },
		{ "label": "Magicast", "type": "node", "data": { "name": "magicast", "content": [ { "type": "text" } ] } },
		{ "type": "select", "data": { "options": [
			{ "label": "Magicast actions", "content": [
<?php
	include("magicast_action.php");
?>
			] },
			{ "label": "Layer actions", "content": [
				{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
				{ "type": "select", "data": { "options": [
<?php
foreach ($CONFIG['magicast/xmleditor_data/new']['layer_action_options'] as $option) {
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
						{ "label": "Method", "type": "node", "data": { "name": "method", "content": [ { "type": "text" } ] } },
						{ "label": "Parameters", "type": "node", "data": { "name": "parameters", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
					] }
				] } }
			] }
		] } }
	] } }
] } }

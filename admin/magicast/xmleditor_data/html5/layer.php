{ "label": "Require access", "type": "attribute", "data": { "name": "Magicaster_requireAccess", "content": [ { "type": "access" } ] } },
{ "label": "Require not access", "type": "attribute", "data": { "name": "Magicaster_requireNotAccess", "content": [ { "type": "access" } ] } },
{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "hint": { "success": true } } ] } },
{ "type": "select", "data": { "options": [
	{ "label": "Empty", "content": [] },		
<?
	foreach ($CONFIG['magicast/xmleditor_data/html5']['layer_options'] as $option) {
?>
	{ "label": "<?= $option['label'] ?>", "content": [
<?
	include($option['include_file']);
?>
	] },		
<?	
	}
?>
	{ "label": "Other", "content": [
		{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [
<?
	include("value.php");
?>
		], "delay": true } },
		{ "label": "Parameters", "type": "node", "data": { "name": "asset", "content": [ { "type": "text", "data": { "multiline": true } } ] } } 
	] }
] } },
{ "label": "Overwrite existing layer?", "type": "node", "data": { "name": "overwrite", "content": [ { "type": "boolean" } ] } },
{ "label": "Properties", "type": "list", "data": { "content": [ { "type": "node", "data": { "name": "property", "content": [
	{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "options": [
<?
	include("layer_property_names.php");
?>
	] } } ] } },
	{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text" } ] } }
] } } ] } },
{ "label": "Collision Detection Groups", "type": "list", "data": { "content": [ { "type": "node", "data": { "name": "collisionDetectionGroup", "content": [
<?
	include("collisionDetectionGroup.php");
?>
] } } ] } },
{ "type": "node", "data": { "name": "css", "content": [
	{ "label": "CSS / Classes", "type": "list", "data": { "content": [
		{ "type": "node", "data": { "name": "class", "content": [ { "type": "text", "data": { "multiline": false } } ] } }
	] } },
	{ "label": "CSS / Style", "type": "node", "data": { "name": "style", "content": [ 
		{ "type": "text", "data": { "multiline": true } } 
	] } }
] } }
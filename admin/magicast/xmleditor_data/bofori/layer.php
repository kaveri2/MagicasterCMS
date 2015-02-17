{ "label": "Require access", "type": "attribute", "data": { "name": "Magicaster_requireAccess", "content": [ { "type": "access" } ] } },
{ "label": "Require not access", "type": "attribute", "data": { "name": "Magicaster_requireNotAccess", "content": [ { "type": "access" } ] } },
{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "hint": { "success": true } } ] } },
{ "type": "select", "data": { "options": [
	{ "label": "Empty", "content": [] },		
<?
	foreach ($CONFIG['magicast/xmleditor_data/bofori']['layer_options'] as $option) {
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
		{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } } 
	] }
] } },
{ "label": "Overwrite existing layer?", "type": "node", "data": { "name": "overwrite", "content": [ { "type": "boolean" } ] } },
{ "label": "Create automatically?", "type": "node", "data": { "name": "autoCreate", "content": [ { "type": "boolean" } ] } },
{ "label": "Properties", "type": "list", "data": { "content": [ { "type": "node", "data": { "name": "property", "content": [
	{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "options": [
<?
	include("layer_property_names.php");
?>
	] } } ] } },
	{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text" } ] } }
] } } ] } }
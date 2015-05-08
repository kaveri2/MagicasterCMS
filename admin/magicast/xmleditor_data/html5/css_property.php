{ "type": "select", "data": { "options": [
	{ "label": "Magicast", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "magicast", "hint": {"failure": true, "success": true} } ] } },
		{ "label": "Magicast (empty = this)", "type": "node", "data": { "name": "magicast", "content": [ { "type": "text" } ] } },
		{ "label": "Additional CSS selector", "type": "node", "data": { "name": "selector", "content": [ { "type": "text" } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "options": [
<?
	include("css_property_names.php");
?>
		] } } ] } }
	] },
	{ "label": "Layer", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "layer", "hint": {"failure": true, "success": true} } ] } },
		{ "label": "Magicast (empty = this)", "type": "node", "data": { "name": "magicast", "content": [ { "type": "text" } ] } },
		{ "label": "Layer (empty = this)", "type": "node", "data": { "name": "layer", "content": [
			{ "type": "include", "data": { "url": "xmleditor_data/html5/include_value.php" } }
		] } },
		{ "label": "Additional CSS selector", "type": "node", "data": { "name": "selector", "content": [ { "type": "text" } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "options": [
<?
	include("css_property_names.php");
?>
		] } } ] } }
	] }
] } }

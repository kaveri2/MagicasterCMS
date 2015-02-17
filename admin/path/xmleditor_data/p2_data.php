[
	{ "type": "select", "data": { "options": [
		{ "label": "Magicast", "content": [
			{ "type": "node", "data": { "name": "magicast", "content": [ 
				{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "Magicast" } ] } },
				{ "type": "node", "data": { "name": "id", "content": [ { "type": "object", "data": { "class": "Magicast" } } ] } }
			] } }
		] },
		{ "label": "Web Content URL", "content": [
			{ "type": "node", "data": { "name": "webContentUrl", "content": [ { "type": "text" } ] } }
		] },
		{ "label": "Areena", "content": [
			{ "label": "Mode", "type": "node", "data": { "name": "areenaMode", "content": [ { "type": "text" } ] } },
			{ "label": "Id", "type": "node", "data": { "name": "areenaId", "content": [ { "type": "text" } ] } }
		] }
	] } },
	{ "label": "Show bar?", "type": "node", "data": { "name": "showBar", "content": [ { "type": "boolean" } ] } },
	{ "label": "Close path", "type": "node", "data": { "name": "closePath", "content": [ { "type": "text" } ] } },
	{ "label": "Color", "type": "node", "data": { "name": "color", "content": [ { "type": "text", "data": { "options": [
<?
	include('../../xmleditor_data/p2_color_options.php');
?>
	] } } ] } },
	{ "label": "Icon image asset", "type": "node", "data": { "name": "iconImageAsset", "content": [ { "type": "asset" } ] } },
	{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } },
	{ "label": "Type", "type": "node", "data": { "name": "type", "content": [ { "type": "text", "data": { "options": [
<?
	include('../../xmleditor_data/p2_action_type_options.php');
?>
	] } } ] } },
	{ "label": "Info", "type": "node", "data": { "name": "info", "content": [ { "type": "text", "data": { "multiline": true } } ] } },
	{ "label": "Age preference", "type": "node", "data": { "name": "age", "content": [ { "type": "text" } ] } },
	{ "label": "Use printer?", "type": "node", "data": { "name": "name", "content": [ { "type": "boolean" } ] } },
	{ "label": "Use camera?", "type": "node", "data": { "name": "name", "content": [ { "type": "boolean" } ] } }
]
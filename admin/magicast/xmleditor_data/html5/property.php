{ "type": "select", "data": { "options": [
	{ "label": "Magicast", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "magicast" } ] } },
<?
	include("magicast_property.php");
?>
	] },
	{ "label": "Layer", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "layer" } ] } },
<?
	include("layer_property.php");
?>
	] }
] } }

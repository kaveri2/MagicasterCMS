{ "type": "select", "data": { "options": [
	{ "label": "Magicast", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "magicast", "hint": {"failure": true, "success": true} } ] } },
<?php
	include("magicast_property.php");
?>
	] },
	{ "label": "Layer", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "layer", "hint": {"failure": true, "success": true} } ] } },
<?php
	include("layer_property.php");
?>
	] }
] } }

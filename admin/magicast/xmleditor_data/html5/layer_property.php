{ "label": "Magicast (empty = this)", "type": "node", "data": { "name": "magicast", "content": [ { "type": "text" } ] } },
{ "label": "Layer (empty = this)", "type": "node", "data": { "name": "layer", "content": [
	{ "type": "include", "data": { "url": "xmleditor_data/html5/include_value.php" } }
] } },
{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "options": [
<?php
	include("layer_property_names.php");
?>
] } } ] } }

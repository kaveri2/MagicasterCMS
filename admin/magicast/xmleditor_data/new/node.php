{ "label": "Require access", "type": "attribute", "data": { "name": "Magicaster_requireAccess", "content": [ { "type": "access" } ] } },
{ "label": "Require not access", "type": "attribute", "data": { "name": "Magicaster_requireNotAccess", "content": [ { "type": "access" } ] } },
{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "hint": { "success": true } } ] } },
{ "label": "Properties", "type": "list", "data": { "content": [ { "type": "node", "data": { "name": "property", "content": [
	{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "options": [
<?php
	include("magicast_property_names.php");
?>
	] } } ] } },
	{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text" } ] } }
] } } ] } },
{ "label": "Layers", "type": "list", "data": { "content": [ { "type": "node", "data": { "errorCatcher": true, "name": "layer", "content": [
<?php
	include("layer.php");
?>
] } } ] } },
{ "label": "Triggers", "type": "list", "data": { "content": [ { "type": "node", "data": { "errorCatcher": true, "name": "trigger", "content": [
<?php
	include("trigger.php");
?>
] } } ] } }

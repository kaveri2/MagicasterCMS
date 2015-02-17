<?php
	require_once("../../core.php");
?>
[
	{ "type": "select", "data": { "options": [
<?
	foreach ($CONFIG['magicast/xmleditor_data']['format_options'] as $option) {
?>
		{ "label": "<?= $option['label'] ?>", "content": [
			{ "type": "node", "data": { "name": "format", "content": [ { "type": "constant", "data":  "<?= $option['value'] ?>", "hint": {"failure": false, "success": true} } ] } },
<?
	include($option['include_file']);
?>
		] },
<?	
		}
?>
		{ "label": "Other", "content": [
			{ "label": "Format", "type": "node", "data": { "name": "format", "content": [ { "type": "text" } ] } },
			{ "label": "Data", "type": "text", "data": { "multiline": true } }			
		] }
	] } }
]
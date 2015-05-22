<?php
	require_once("../../core.php");
?>
[
	{ "type": "select", "data": { "options": [
<?php
	foreach ($CONFIG['magicast/xmleditor_data']['format_options'] as $option) {
?>
		{ "label": "<?php echo $option['label'] ?>", "content": [
			{ "type": "node", "data": { "name": "format", "content": [ { "type": "constant", "data":  "<?php echo $option['value'] ?>", "hint": {"failure": false, "success": true} } ] } },
<?php
	include($option['include_file']);
?>
		] },
<?php	
		}
?>
		{ "label": "Other", "content": [
			{ "label": "Format", "type": "node", "data": { "name": "format", "content": [ { "type": "text" } ] } },
			{ "label": "Data", "type": "text", "data": { "multiline": true } }			
		] }
	] } }
]
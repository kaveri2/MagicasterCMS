{ "type": "select", "data": { "options": [
<?php
	foreach ($CONFIG['xmleditor_data']['style_options'] as $option) {
?>
	{ "label": "<?php echo $option['label'] ?>", "content": [
<?php
	include($option['include_file']);
?>
	] },		
<?php	
	}
?>
	{ "label": "Other", "content": [
		{ "label": "XML", "type": "text", "data": { "multiline": true } } 
	] }
] } }

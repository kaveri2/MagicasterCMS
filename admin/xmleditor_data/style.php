{ "type": "select", "data": { "options": [
<?
	foreach ($CONFIG['xmleditor_data']['style_options'] as $option) {
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
		{ "label": "XML", "type": "text", "data": { "multiline": true } } 
	] }
] } }

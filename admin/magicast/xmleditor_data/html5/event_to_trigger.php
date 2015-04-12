{ "label": "Delay (seconds)", "type": "node", "data": { "name": "delay", "content": [ { "type": "text" } ] } },
{ "label": "Event", "type": "select", "data": { "options": [
	{ "label": "N/A", "content": [
	] },
<?
		foreach ($CONFIG['magicast/xmleditor_data/html5']['event_options'] as $option) {
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
<?
			include('event.php');
?>,
		{ "label": "Arguments", "type": "list", "data": { "content": [
			{ "type": "node", "data": { "name": "argument", "content": [ 
				{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } },
				{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ 
					{ "type": "include", "data": { "url": "xmleditor_data/html5/include_value.php" } }
				] } }
			] } }
		] } }
	] }
] } }
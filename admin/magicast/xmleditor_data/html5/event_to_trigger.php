{ "type": "select", "data": { "options": [
	{ "label": "N/A", "content": [
	] },
<?php
		foreach ($CONFIG['magicast/xmleditor_data/html5']['event_options'] as $option) {
?>
	{ "label": "<?php echo $option['label'] ?>", "content": [
		{ "label": "Delay (seconds)", "type": "node", "data": { "name": "delay", "content": [
<?php
	include("value.php");
?>
		] } },
<?php
			include($option['include_file']);
?>
	] },
<?php
		}
?>
	{ "label": "Other", "content": [
		{ "label": "Delay (seconds)", "type": "node", "data": { "name": "delay", "content": [
<?php
	include("value.php");
?>
		] } },
<?php
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
<?php
	if (count($CONFIG['magicast/xmleditor_data/new']['event_options'])>0) {
?>
{ "type": "select", "data": { "options": [
<?php
		foreach ($CONFIG['magicast/xmleditor_data/new']['event_options'] as $option) {
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
<?php
			include('event.php');
?>,
		{ "label": "Arguments", "type": "list", "data": { "content": [
			{ "type": "node", "data": { "name": "argument", "content": [ 
				{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } },
				{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ 
					{ "type": "include", "data": { "url": "xmleditor_data/new/include_value.php" } }
				] } }
			] } }
		] } }
	] }
] } }
<?php
	} else  {
?>
<?php
	include('event.php');
?>,
{ "label": "Arguments", "type": "list", "data": { "content": [
	{ "type": "node", "data": { "name": "argument", "content": [ 
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } },
		{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ 
			{ "type": "include", "data": { "url": "xmleditor_data/new/include_value.php" } }
		] } }
	] } }
] } }
<?php
	}
?>
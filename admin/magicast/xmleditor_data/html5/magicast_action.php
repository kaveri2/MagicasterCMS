{ "type": "select", "data": { "options": [
	{ "label": "Generic", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Trigger event", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "triggerEvent", "hint": { "failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
<?
	include("event_to_trigger.php");
?>
				] } }
			] },
			{ "label": "Change node", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeNode", "hint": {"failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
					] } }
				] } }
			] },
			{ "label": "Change property", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeProperty", "hint": {"failure": true, "success": true } } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Property", "type": "node", "data": { "name": "property", "content": [
<?
	include("property.php");
?>
					] } },
					{ "label": "Value", "type": "node", "data": { "name": "value", "content": [
<?
	include("value.php");
?>
					] } },
					{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
					{ "label": "Ease", "type": "node", "data": { "name": "ease", "content": [ { "type": "text", "data": { "options": [
<?
	include("ease_names.php");
?>
					] } } ] } },
					{ "label": "Complete event", "type": "node", "data": { "name": "completeEvent", "content": [
<?
	include("event_to_trigger.php");
?>
					] } }
				] } }
			] },
			{ "label": "Set variable", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setVariable", "hint": {"failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [
					{ "type": "node", "data": { "name": "variable", "content": [
<?
	include("variable.php");
?>
					] } },
					{ "label": "Value", "type": "node", "data": { "name": "value", "content": [
<?
	include("value.php");
?>
					] } }
				] } }
			] },
			{ "label": "Set CSS style", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setCssStyle" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [
					{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
					{ "label": "Style", "type": "node", "data": { "name": "cssStyle", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
				] } }
			] },
			{ "label": "Add CSS class", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "addCssClass" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
					{ "label": "Class", "type": "node", "data": { "name": "cssClass", "content": [ { "type": "text" } ] } }
				] } }
			] },
			{ "label": "Remove CSS class", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "removeCssClass" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
					{ "label": "Class", "type": "node", "data": { "name": "cssClass", "content": [ { "type": "text" } ] } }
				] } }
			] },
			{ "label": "Apply collision detection group", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "applyCollisionDetectionGroup" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [
					{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
					{ "type": "node", "data": { "name": "collisionDetectionGroup", "content": [ 
<?
	include("collisionDetectionGroup.php");
?>
					] } }
				] } }
			] },
			{ "label": "Capture image", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "captureImage", "hint": {"failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
					{ "label": "Variables", "type": "node", "data": { "name": "variable", "content": [
<?
	include("variable.php");
?>
					] } }
				] } }
			] }
		] } } 
	] },
<?
foreach ($CONFIG['magicast/xmleditor_data/html5']['magicast_action_options'] as $option) {
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
		{ "label": "Method", "type": "node", "data": { "name": "method", "content": [ { "type": "text" } ] } },
		{ "label": "Parameters", "type": "node", "data": { "name": "parameters", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
	] }
] } }
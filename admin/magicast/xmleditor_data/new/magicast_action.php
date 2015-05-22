{ "type": "select", "data": { "options": [
	{ "label": "Generic", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Trigger event", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "triggerEvent", "hint": { "failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
<?php
	include("event_to_trigger.php");
?>
				] } }
			] },
			{ "label": "Change node", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeNode", "hint": {"failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "value", "content": [ 
<?php
	include("value.php");
?>
					] } }
				] } }
			] },
			{ "label": "Change property", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeProperty", "hint": {"failure": true, "success": true } } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Property", "type": "node", "data": { "name": "property", "content": [
<?php
	include("property.php");
?>
					] } },
					{ "label": "Value", "type": "node", "data": { "name": "value", "content": [
<?php
	include("value.php");
?>
					] } },
					{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
					{ "label": "Ease", "type": "node", "data": { "name": "ease", "content": [ { "type": "text", "data": { "options": [
<?php
	include("ease_names.php");
?>
					] } } ] } },
					{ "label": "Complete event", "type": "node", "data": { "name": "completeEvent", "content": [
<?php
	include("event_to_trigger.php");
?>
					] } }
				] } }
			] },
			{ "label": "Set variable", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setVariable", "hint": {"failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [
					{ "type": "node", "data": { "name": "variable", "content": [
<?php
	include("variable.php");
?>
					] } },
					{ "label": "Value", "type": "node", "data": { "name": "value", "content": [
<?php
	include("value.php");
?>
					] } }
				] } }
			] },
			{ "label": "Apply collision detection group", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "applyCollisionDetectionGroup", "hint": {"failure": true, "success": true } } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [
					{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
					{ "type": "node", "data": { "name": "collisionDetectionGroup", "content": [ 
<?php
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
<?php
	include("variable.php");
?>
					] } }
				] } }
			] },
			{ "label": "Create Animator", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "createAnimator", "hint": {"failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
					{ "label": "Type", "type": "node", "data": { "name": "type", "content": [ { "type": "text", "data": { "options": [
						{ "label": "Absolute", "value": "abs" }
					] } } ] } },
					{ "label": "Data", "type": "node", "data": { "name": "data", "content": [ { "type": "text", "data": { "multiline": true } } ] } },
					{ "label": "Starting Frame", "type": "node", "data": { "name": "startFrame", "content": [ { "type": "text" } ] } },
					{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
					{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } }
				] } }
			] },
			{ "label": "Destroy Animator", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "destroyAnimator", "hint": {"failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
					{ "label": "Type", "type": "node", "data": { "name": "type", "content": [ { "type": "text", "data": { "options": [
						{ "label": "Absolute", "value": "abs" }
					] } } ] } }
				] } }
			] },
			{ "label": "Control Animator", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "controlAnimator", "hint": {"failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
					{ "label": "Type", "type": "node", "data": { "name": "type", "content": [ { "type": "text", "data": { "options": [
						{ "label": "Absolute", "value": "abs" }
					] } } ] } },
					{ "label": "Command", "type": "node", "data": { "name": "command", "content": [ { "type": "text", "data": { "options": [
						{ "label": "Play", "value": "play" },
						{ "label": "Stop", "value": "stop" },
						{ "label": "Pause", "value": "pause" },
						{ "label": "Resume", "value": "resume" }
					] } } ] } }
				] } }
			] },
			{ "label": "Open browser", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "openBrowser", "hint": {"failure": true, "success": true} } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "URL", "type": "node", "data": { "name": "URL", "content": [ { "type": "text" } ] } },
					{ "label": "Target", "type": "node", "data": { "name": "target", "content": [ { "type": "text", "data": { "options": [
						{ "label": "New window", "value": "_blank" },
						{ "label": "This frame", "value": "_self" },
						{ "label": "Parent frame", "value": "_parent" },
						{ "label": "Top frame", "value": "_top" }
					] } } ] } }
				] } }
			] }
		] } } 
	] },
<?php
foreach ($CONFIG['magicast/xmleditor_data/new']['magicast_action_options'] as $option) {
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
		{ "label": "Method", "type": "node", "data": { "name": "method", "content": [ { "type": "text" } ] } },
		{ "label": "Parameters", "type": "node", "data": { "name": "parameters", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
	] }
] } }
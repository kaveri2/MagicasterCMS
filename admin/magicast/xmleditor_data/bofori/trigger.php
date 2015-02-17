{ "label": "Require access", "type": "attribute", "data": { "name": "Magicaster_requireAccess", "content": [ { "type": "access" } ] } },
{ "label": "Require not access", "type": "attribute", "data": { "name": "Magicaster_requireNotAccess", "content": [ { "type": "access" } ] } },
{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "hint": { "success": true } } ] } },
{ "label": "Overwrite existing trigger?", "type": "node", "data": { "name": "overwrite", "content": [ { "type": "boolean" } ] } },
{ "label": "Trigger immediately?", "type": "node", "data": { "name": "immediate", "content": [ { "type": "boolean" } ] } },
{ "label": "Triggering events", "type": "list", "data": { "content": [ 
	{ "type": "node", "data": { "name": "event", "content": [ 
		{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
	] } }
] } },
{ "label": "Conditions", "type": "list", "data": { "content": [ 
	{ "type": "node", "data": { "name": "condition", "content": [ 
		{ "label": "Variable", "type": "node", "data": { "name": "variable", "content": [ { "type": "text" } ] } },
		{ "label": "Operator", "type": "node", "data": { "name": "operator", "content": [ { "type": "text", "data": { "options": [
			{ "label": "==", "value": "eq" },
			{ "label": "!=", "value": "ne" },
			{ "label": "&gt;", "value": "gt" },
			{ "label": "&lt;", "value": "lt" },
			{ "label": "IS NULL", "value": "isNull" },
			{ "label": "IS NOT NULL", "value": "isNotNull" }
		] } } ] } },
		{ "label": "Argument", "type": "node", "data": { "name": "argument", "content": [ { "type": "text" } ] } }
	] } }
] } },
{ "label": "Actions to run", "type": "list", "data": { "content": [ 
	{ "type": "node", "data": { "name": "action", "content": [ 
		{ "label": "Wait (seconds)", "type": "node", "data": { "name": "wait", "content": [ { "type": "text" } ] } },
		{ "type": "select", "data": { "options": [
			{ "label": "Node actions", "content": [
				{ "type": "select", "data": { "options": [
					{ "label": "Magicast", "content": [
						{ "type": "select", "data": { "options": [
							{ "label": "Change node", "content": [
								{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeNode", "hint": {"failure": true, "success": true} } ] } },
								{ "type": "node", "data": { "name": "parameters", "content": [ 
									{ "label": "Option", "type": "list", "data": { "content": [ 
										{ "type": "node", "data": { "name": "option", "content": [ 
											{ "label": "Node", "type": "node", "data": { "name": "node", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
											{ "label": "Weight", "type": "node", "data": { "name": "weight", "content": [ { "type": "text", "data": { "multiline": false } } ] } }
										] } }
									] } }
								] } }
							] },
							{ "label": "Trigger event", "content": [
								{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "triggerEvent", "hint": {"failure": true, "success": true} } ] } },
								{ "type": "node", "data": { "name": "parameters", "content": [ 
									{ "label": "Option", "type": "list", "data": { "content": [ 
										{ "type": "node", "data": { "name": "option", "content": [ 
											{ "label": "Event layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
											{ "label": "Event name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
											{ "label": "Event parameters", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "multiline": true } } ] } },
											{ "label": "Weight", "type": "node", "data": { "name": "weight", "content": [ { "type": "text", "data": { "multiline": false } } ] } }
										] } }
									] } }
								] } }
							] },
							{ "label": "Change node property", "content": [
								{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeProperty" } ] } },
								{ "type": "node", "data": { "name": "parameters", "content": [ 
									{ "label": "Property", "type": "node", "data": { "name": "property", "content": [ { "type": "text", "data": { "options": [
<?
	include("node_property_names.php");
?>
									] } } ] } },
									{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text" } ] } },
									{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
									{ "label": "Ease", "type": "node", "data": { "name": "ease", "content": [ { "type": "text", "data": { "options": [
<?
	include("ease_names.php");
?>
									] } } ] } },
									{ "label": "Wait (seconds)", "type": "node", "data": { "name": "wait", "content": [ { "type": "text" } ] } },
									{ "label": "Complete event name", "type": "node", "data": { "name": "completeEventName", "content": [ { "type": "text" } ] } }
								] } }
							] },
							{ "label": "Change layer property", "content": [
								{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeProperty" } ] } },
								{ "type": "node", "data": { "name": "parameters", "content": [ 
									{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
									{ "label": "Property", "type": "node", "data": { "name": "property", "content": [ { "type": "text", "data": { "options": [
<?
	include("layer_property_names.php");
?>
									] } } ] } },
									{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text" } ] } },
									{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
									{ "label": "Ease", "type": "node", "data": { "name": "ease", "content": [ { "type": "text", "data": { "options": [
<?
	include("ease_names.php");
?>
									] } } ] } },
									{ "label": "Wait (seconds)", "type": "node", "data": { "name": "wait", "content": [ { "type": "text" } ] } },
									{ "label": "Complete event name", "type": "node", "data": { "name": "completeEventName", "content": [ { "type": "text" } ] } }
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
							{ "label": "Set variable", "content": [
								{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setVariable", "hint": {"failure": true, "success": true} } ] } },
								{ "type": "node", "data": { "name": "parameters", "content": [ 
									{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } },
									{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text" } ] } }
								] } }
							] },
							{ "label": "Calculate variable", "content": [
								{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "calculateVariable", "hint": {"failure": true, "success": true} } ] } },
								{ "type": "node", "data": { "name": "parameters", "content": [ 
									{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } },
									{ "label": "Function", "type": "node", "data": { "name": "function", "content": [ { "type": "text", "data": { "options": [
										{ "label": "add", "value": "add" },
										{ "label": "dec", "value": "dec" },
										{ "label": "mul", "value": "mul" },
										{ "label": "div", "value": "div" },
										{ "label": "concat", "value": "concat" }
									] } } ] } },
									{ "label": "Argument", "type": "node", "data": { "name": "argument", "content": [ { "type": "text" } ] } }
								] } }
							] },
							{ "label": "Capture image", "content": [
								{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "captureImage", "hint": {"failure": true, "success": true} } ] } },
								{ "type": "node", "data": { "name": "parameters", "content": [ 
									{ "label": "Layer name", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
									{ "label": "Variable name", "type": "node", "data": { "name": "variable", "content": [ { "type": "text" } ] } }
								] } }
							] },
							{ "label": "Open Browser", "content": [
								{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "openBrowser", "hint": {"failure": true, "success": true} } ] } },
								{ "type": "node", "data": { "name": "parameters", "content": [ 
									{ "label": "URL", "type": "node", "data": { "name": "URL", "content": [ { "type": "text" } ] } },
									{ "label": "Target", "type": "node", "data": { "name": "target", "content": [ { "type": "text" } ] } }
								] } }
							] }
						] } } 
					] },
<?
	foreach ($CONFIG['magicast/xmleditor_data/bofori']['node_action_options'] as $option) {
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
			] },
			{ "label": "Layer actions", "content": [
				{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
				{ "type": "select", "data": { "options": [
<?
	foreach ($CONFIG['magicast/xmleditor_data/bofori']['layer_action_options'] as $option) {
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
			] }
		] } }
	] } }
] } }

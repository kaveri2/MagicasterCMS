{ "type": "select", "data": { "options": [
	{ "label": "Trigger event", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/triggerevent.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
<?
	include("event_to_trigger.php");
?>
		] } }
	] },
	{ "label": "Change node", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/changenode.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
			], "delay": true } }
		] } }
	] },
	{ "label": "Change property", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/changeproperty.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
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
			], "delay": true } },
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
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/setvariable.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [
			{ "label": "Variable", "type": "node", "data": { "name": "variable", "content": [
<?
	include("variable.php");
?>
			] } },
			{ "label": "Value", "type": "node", "data": { "name": "value", "content": [
<?
	include("value.php");
?>
			], "delay": true } }
		] } }
	] },
	{ "label": "Set array item", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/setarrayitem.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [
			{ "label": "Array", "type": "node", "data": { "name": "array", "content": [ { "type": "text" } ] } },
			{ "label": "Index", "type": "node", "data": { "name": "index", "content": [ { "type": "text" } ] } },
			{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text" } ] } }
		] } }
	] },
	{ "label": "Push array item", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/pusharrayitem.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [
			{ "label": "Array", "type": "node", "data": { "name": "array", "content": [ { "type": "text" } ] } },
			{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text" } ] } }
		] } }
	] },	
	{ "label": "Set CSS style", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/setcssstyle.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
			{ "label": "Style", "type": "node", "data": { "name": "cssStyle", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
		] } }
	] },
	{ "label": "Add CSS class", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/addcssclass.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
			{ "label": "Class", "type": "node", "data": { "name": "cssClass", "content": [ { "type": "text" } ] } }
		] } }
	] },
	{ "label": "Remove CSS class", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/removecssclass.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
			{ "label": "Class", "type": "node", "data": { "name": "cssClass", "content": [ { "type": "text" } ] } }
		] } }
	] },
	{ "label": "Apply collision detection group", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/applycollisiondetectiongroup.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
			{ "label": "Collision detection group", "type": "node", "data": { "name": "collisionDetectionGroup", "content": [ 
<?
	include("collisionDetectionGroup.php");
?>
			] } }
		] } }
	] },
	{ "label": "Capture image", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/captureimage.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
			{ "label": "Variable", "type": "node", "data": { "name": "variable", "content": [
<?
	include("variable.php");
?>
			] } }
		] } }
	] },
	{ "label": "Open browser", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/openbrowser.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "URL", "type": "node", "data": { "name": "url", "content": [
<?
	include("value.php");
?>
			], "delay": true } },
			{ "label": "Target", "type": "node", "data": { "name": "target", "content": [
<?
	include("value.php");
?>
			], "delay": true } }
		] } }
	] }
] } }
{ "type": "select", "data": { "options": [
	{ "label": "Set brush color", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setBrushColor" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
			] } }
		] } }
	] },
	{ "label": "Set brush alpha", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setBrushAlpha" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
			] } }
		] } }
	] },
	{ "label": "Set brush thickness", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setBrushThickness" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
			] } }
		] } }
	] },
	{ "label": "Set brush blend mode", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setBrushBlendMode" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
			] } }
		] } }
	] },
	{ "label": "Clear canvas", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "clearCanvas" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
		] } }
	] },
	{ "label": "Fill canvas", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "fillCanvas" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
			] } }
		] } }
	] },
	{ "label": "Stop drawing", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "stopDrawing" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
		] } }
	] }
] } }
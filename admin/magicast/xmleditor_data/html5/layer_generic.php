{ "type": "select", "data": { "options": [
	{ "label": "Video", "color": "#cab426", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "components/2015/video.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
			{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [
<?
	include("value.php");
?>
			], "delay": true } },
			{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
				{ "type": "node", "data": { "name": "cue", "content": [ 
					{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
					{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
				] } }
			] } },
			{ "label": "Controls?", "type": "node", "data": { "name": "controls", "content": [ { "type": "boolean" } ] } },
			{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
			{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } }
		] } }
	] },
	{ "label": "Audio", "color": "#53b257", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "components/2015/audio.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
			{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [
<?
	include("value.php");
?>
			], "delay": true } },
			{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
				{ "type": "node", "data": { "name": "cue", "content": [ 
					{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
					{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
				] } }
			] } },
			{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
			{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } }
		] } }
	] },
	{ "label": "Image", "color": "#3c84d1", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "components/2015/image.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
			{ "type": "select", "data": { "options": [
				{ "label": "Asset", "content": [
					{ "type": "node", "data": { "name": "asset", "content": [
<?
	include("value.php");
?>
					], "delay": true } }
				] },
				{ "label": "Data", "content": [
					{ "type": "node", "data": { "name": "data", "content":  [
<?
	include("value.php");
?>
					], "delay": true } }
				] }
			] } }
		] } }
	] },
	{ "label": "Text", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "components/2015/text.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Text", "type": "node", "data": { "name": "text", "content": [ 
<?
	include("value.php");
?>
			], "delay": true } },
			{ "label": "Scale", "type": "node", "data": { "name": "scale", "content": [ { "type": "text", "data": { "options": [
				{ "label": "None", "value": "none" },
				{ "label": "Up", "value": "up" },
				{ "label": "Down", "value": "down" },
				{ "label": "Both", "value": "both" }
			] } } ] } },
			{ "label": "Word wrap?", "type": "node", "data": { "name": "wordWrap", "content": [ { "type": "boolean" } ] } },
			{ "label": "Clip?", "type": "node", "data": { "name": "clip", "content": [ { "type": "boolean" } ] } },
			{ "label": "Color (CSS value)", "type": "node", "data": { "name": "color", "content": [ { "type": "text" } ] } },
			{ "label": "Font family", "type": "node", "data": { "name": "fontFamily", "content": [ { "type": "text" } ] } },
			{ "label": "Font size (px)", "type": "node", "data": { "name": "fontSize", "content": [ { "type": "text" } ] } },
			{ "label": "Align", "type": "node", "data": { "name": "align", "content": [ { "type": "text", "data": { "options": [
				{ "label": "Left", "value": "left" },
				{ "label": "Right", "value": "right" },
				{ "label": "Center", "value": "center" },
				{ "label": "Justify", "value": "justify" }
			] } } ] } },
			{ "label": "Line height (px)", "type": "node", "data": { "name": "lineHeight", "content": [ { "type": "text" } ] } },
			{ "label": "Letter spacing (px)", "type": "node", "data": { "name": "letterSpacing", "content": [ { "type": "text" } ] } },
			{ "label": "Decoration", "type": "node", "data": { "name": "decoration", "content": [ { "type": "text", "data": { "options": [
				{ "label": "None", "value": "none" },
				{ "label": "Underline", "value": "underline" },
				{ "label": "Overline", "value": "overline" },
				{ "label": "Line-through", "value": "line-through" }
			] } } ] } }
		] } }		
	] },
	{ "label": "Dummy", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2015/dummy.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Text", "type": "node", "data": { "name": "text", "content": [ { "type": "text", "data": { "multiline": true } } ] } },
			{ "label": "Button?", "type": "node", "data": { "name": "button", "content": [ { "type": "boolean" } ] } }
		] } }
	] }
] } }
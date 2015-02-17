{ "type": "select", "data": { "options": [
	{ "label": "Video", "color": "#cab426", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "component" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/video.js", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } },
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
		] } }
	] },
	{ "label": "Audio", "color": "#53b257", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "component" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/audio.js", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [
<?
	include("asset.php");
?>
				] } },
				{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "cue", "content": [ 
						{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
						{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
					] } }
				] } },
				{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
				{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } }
			] } }
		] } }
	] },
	{ "label": "Image", "color": "#3c84d1", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "component" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/image.js", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "type": "select", "data": { "options": [
					{ "label": "Asset", "content": [
						{ "type": "node", "data": { "name": "asset", "content": [
<?
	include("asset.php");
?>
						] } }
					] },
					{ "label": "Value", "content": [
						{ "type": "node", "data": { "name": "value", "content":  [
<?
	include("value.php");
?>
						] } }
					] }
				] } }
			] } }
		] } }
	] },
	{ "label": "Text", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "component" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/text.js", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "content": [ 
				{ "label": "Text", "type": "node", "data": { "name": "textValue", "content": [ 
<?
	include("value.php");
?>
				] } },
				{ "label": "Scale", "type": "node", "data": { "name": "scale", "content": [ { "type": "text", "data": { "options": [
					{ "label": "None", "value": "none" },
					{ "label": "Up", "value": "up" },
					{ "label": "Down", "value": "down" },
					{ "label": "Both", "value": "both" }
				] } } ] } },
				{ "label": "Word wrap?", "type": "node", "data": { "name": "wordWrap", "content": [ { "type": "boolean" } ] } },
				{ "label": "Clip?", "type": "node", "data": { "name": "clip", "content": [ { "type": "boolean" } ] } }
			] } }
		] } }
	] },
	{ "label": "Dummy", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/dummy.js", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "content": [ 
				{ "label": "Text", "type": "node", "data": { "name": "text", "content": [ { "type": "text", "data": { "multiline": true } } ] } },
				{ "label": "Button?", "type": "node", "data": { "name": "button", "content": [ { "type": "boolean" } ] } }
			] } }
		] } }
	] }
] } }
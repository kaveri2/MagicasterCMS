{ "type": "select", "data": { "options": [
	{ "label": "Audio", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/controlaudio.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
			{ "type": "select", "data": { "options": [
				{ "label": "Play", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "play", "hint": {"failure": true} } ] } }
				] },
				{ "label": "Seek", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "seek", "hint": {"failure": true} } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "label": "Time (s)", "type": "node", "data": { "name": "time", "content": [
<?
	include("value.php");
?>
						] } }
					] } }
				] },
				{ "label": "Pause", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "pause", "hint": {"failure": true} } ] } }
				] },
				{ "label": "Resume", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "resume", "hint": {"failure": true} } ] } }
				] },
				{ "label": "Stop", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "stop", "hint": {"failure": true} } ] } }
				] }
			] } }
		] } }
	] },
	{ "label": "Image", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/controlimage.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
			{ "type": "select", "data": { "options": [
				{ "label": "Set asset", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setAsset", "hint": {"failure": true} } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "type": "node", "data": { "name": "value", "content": [
<?
	include("asset.php");
?>
						] } }
					] } }
				] },
				{ "label": "Set data", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setData", "hint": {"failure": true} } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
						] } }
					] } }
				] }
			] } }
		] } }
	] },
	{ "label": "Text", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/controltext.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
			{ "type": "select", "data": { "options": [
				{ "label": "Set text", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setText", "hint": {"failure": true} } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
						] } }
					] } }
				] }
			] } }
		] } }
	] },	
	{ "label": "Video", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/controlvideo.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
			{ "type": "select", "data": { "options": [
				{ "label": "Play", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "play", "hint": {"failure": true} } ] } }
				] },
				{ "label": "Seek", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "seek", "hint": {"failure": true} } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "label": "Time (s)", "type": "node", "data": { "name": "time", "content": [
<?
	include("value.php");
?>
						] } }
					] } }
				] },
				{ "label": "Pause", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "pause", "hint": {"failure": true} } ] } }
				] },
				{ "label": "Resume", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "resume", "hint": {"failure": true} } ] } }
				] },
				{ "label": "Stop", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "stop", "hint": {"failure": true} } ] } }
				] }
			] } }
		] } }
	] }
] } }
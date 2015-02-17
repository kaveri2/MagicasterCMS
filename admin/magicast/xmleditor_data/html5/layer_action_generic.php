{ "type": "select", "data": { "options": [
	{ "label": "Audio / Video / Animation", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Play", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "play" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
				] } }
			] },
			{ "label": "Seek", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "seek" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Time", "type": "node", "data": { "name": "timeValue", "content": [
<?
	include("value.php");
?>
					] } }
				] } }
			] },
			{ "label": "Pause", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "pause" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
				] } }
			] },
			{ "label": "Resume", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "resume" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
				] } }
			] },
			{ "label": "Stop", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "stop" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
				] } }
			] }
		] } }
	] },
	{ "label": "Image / Animation", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Set asset", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setAsset" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "asset", "content": [
<?
	include("asset.php");
?>
					] } }
				] } }
			] }
		] } }
	] },
	{ "label": "Image", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Set value", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setValue" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
					] } }
				] } }
			] }
		] } }
	] },
	{ "label": "Text", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Set text", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setText" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "value", "content": [ 
<?
	include("value.php");
?>
					] } }
				] } }
			] }
		] } }
	] }
] } }
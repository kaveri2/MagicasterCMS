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
<?php
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
	{ "label": "Audio / Video", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Set volume", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setVolume" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "value", "content": [
<?php
	include("value.php");
?>
					] } }
				] } }
			] }
		] } }
	] },	
	{ "label": "Image / Animation", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Set style", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setStyle" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "style", "errorCatcher": true, "content": [ 
<?php
	include("../../xmleditor_data/style.php");
?>
					] } }
				] } }
			] },
			{ "label": "Change asset", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeAsset" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "asset", "content": [
<?php
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
<?php
	include("value.php");
?>
					] } }
				] } }
			] }
		] } }
	] },
	{ "label": "Animation", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Set frames per second", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setFps" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "value", "content": [ 
<?php
	include("value.php");
?>
					] } }
				] } }
			] }
		] } }
	] },
	{ "label": "Timer", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Start", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "start" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
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
			] },
			{ "label": "Restart", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "restart" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
				] } }
			] },
			{ "label": "Set interval", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setInterval" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "value", "content": [ 
<?php
	include("value.php");
?>
					] } }
				] } }
			] },
			{ "label": "Set repeats", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setRepeats" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "type": "node", "data": { "name": "value", "content": [ 
<?php
	include("value.php");
?>
					] } }
				] } }
			] }
		] } }
	] },
	{ "label": "Language manager", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Play", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "play" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Id", "type": "node", "data": { "name": "id", "content": [ { "type": "text" } ] } },
					{ "label": "Priority", "type": "node", "data": { "name": "priority", "content": [ { "type": "text" } ] } }
				] } }
			] },
			{ "label": "Enqueue", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "enqueue" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Id", "type": "node", "data": { "name": "id", "content": [ { "type": "text" } ] } },
					{ "label": "Priority", "type": "node", "data": { "name": "priority", "content": [ { "type": "text" } ] } }
				] } }
			] },
			{ "label": "Set language", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setLanguage" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } },
					{ "label": "Priority", "type": "node", "data": { "name": "priority", "content": [ { "type": "text" } ] } }
				] } }
			] }
		] } }	
	] }
] } }
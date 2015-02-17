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
					{ "label": "Time", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } }
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
			{ "label": "Change style", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeStyle" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Style", "type": "node", "data": { "name": "style", "errorCatcher": true, "content": [ 
<?
	include("../../xmleditor_data/style.php");
?>
					] } }
				] } }
			] },
			{ "label": "Change asset", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeAsset" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } }
				] } }
			] }
		] } }
	] },
	{ "label": "Image", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Change variable", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeVariable" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
				] } }
			] }
		] } }
	] },
	{ "label": "Animation", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Change frames per second", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeFps" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
					{ "label": "Frames per second", "type": "node", "data": { "name": "fps", "content": [ { "type": "text" } ] } }
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
			{ "label": "Stop", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "stop" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
				] } }
			] },
			{ "label": "Restart", "content": [
				{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "restart" } ] } },
				{ "type": "node", "data": { "name": "parameters", "content": [ 
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
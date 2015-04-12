{ "type": "select", "data": { "options": [
	{ "label": "YouTube", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2015/controlyoutube.js", "hint": {"failure": true, "success": true} } ] } }
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
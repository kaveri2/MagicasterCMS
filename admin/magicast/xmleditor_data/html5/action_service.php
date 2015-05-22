{ "type": "select", "data": { "options": [
	{ "label": "YouTube", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/controlyoutube.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [
<?php
	include("value.php");
?>
			], "delay": true } },
			{ "type": "select", "data": { "options": [
				{ "label": "Play", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "play" } ] } }
				] },
				{ "label": "Seek", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "seek" } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "label": "Time (s)", "type": "node", "data": { "name": "time", "content": [
<?php
	include("value.php");
?>
						], "delay": true } }
					] } }
				] },
				{ "label": "Pause", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "pause" } ] } }
				] },
				{ "label": "Resume", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "resume" } ] } }
				] },
				{ "label": "Stop", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "stop" } ] } }
				] }
			] } }
		] } }
	] }
] } }
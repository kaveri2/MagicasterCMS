{ "type": "select", "data": { "options": [
	{ "label": "Audio", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/controlaudio.js", "hint": {"failure": true, "success": true} } ] } }
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
	] },
	{ "label": "Image", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/controlimage.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [
<?php
	include("value.php");
?>
			], "delay": true } },
			{ "type": "select", "data": { "options": [
				{ "label": "Set asset", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setAsset" } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "type": "node", "data": { "name": "value", "content": [
<?php
	include("value.php");
?>
						], "delay": true } }
					] } }
				] },
				{ "label": "Set data", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setData" } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "type": "node", "data": { "name": "value", "content": [ 
<?php
	include("value.php");
?>
						], "delay": true } }
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
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [
<?php
	include("value.php");
?>
			], "delay": true } },
			{ "type": "select", "data": { "options": [
				{ "label": "Set text", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setText" } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "type": "node", "data": { "name": "value", "content": [ 
<?php
	include("value.php");
?>
						], "delay": true } }
					] } }
				] }
			] } }
		] } }
	] },	
	{ "label": "Box", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "actions/2015/controlbox.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Layer", "type": "node", "data": { "name": "layer", "content": [
<?php
	include("value.php");
?>
			], "delay": true } },
			{ "type": "select", "data": { "options": [
				{ "label": "Set texture asset", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setTextureAsset" } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "type": "node", "data": { "name": "value", "content": [
<?php
	include("value.php");
?>
						], "delay": true } }
					] } }
				] },
				{ "label": "Set texture data", "content": [
					{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "setTextureData" } ] } },
					{ "type": "node", "data": { "name": "parameters", "content": [ 
						{ "type": "node", "data": { "name": "value", "content": [ 
<?php
	include("value.php");
?>
						], "delay": true } }
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
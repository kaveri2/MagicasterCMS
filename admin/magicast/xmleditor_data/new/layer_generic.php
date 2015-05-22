{ "type": "select", "data": { "options": [
	{ "label": "Video", "color": "#cab426", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/video.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [
<?php
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
				{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } },
				{ "label": "Volume (%)", "type": "node", "data": { "name": "volumeValue", "content":  [
<?php
	include("value.php");
?>
				] } },
				{ "label": "Preload?", "type": "node", "data": { "name": "preload", "content": [ { "type": "boolean" } ] } },
				{ "label": "Buffer time (s)", "type": "node", "data": { "name": "bufferTime", "content": [ { "type": "text" } ] } }
			] } }
		] } }
	] },
	{ "label": "Audio", "color": "#53b257", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/audio.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [
<?php
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
				{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } },
				{ "label": "Volume (%)", "type": "node", "data": { "name": "volumeValue", "content":  [
<?php
	include("value.php");
?>
				] } },
				{ "label": "Accurate?", "type": "node", "data": { "name": "accurate", "content": [ { "type": "boolean" } ] } }
			] } }
		] } }
	] },
	{ "label": "Image", "color": "#3c84d1", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/image.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "type": "select", "data": { "options": [
					{ "label": "Asset", "content": [
						{ "type": "node", "data": { "name": "asset", "content": [
<?php
	include("asset.php");
?>
						] } }
					] },
					{ "label": "Value", "content": [
						{ "type": "node", "data": { "name": "value", "content":  [
<?php
	include("value.php");
?>
						] } }
					] }
				] } },
				{ "label": "Style", "type": "node", "data": { "name": "style", "errorCatcher": true, "content": [ 
<?php
	include("../../xmleditor_data/style.php");
?>
				] } }
			] } }
		] } }
	] },
	{ "label": "Animation", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/animation.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [
<?php
	include("asset.php");
?>
				] } },
				{ "label": "Frames per second", "type": "node", "data": { "name": "fps", "content": [ { "type": "text" } ] } },
				{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "cue", "content": [ 
						{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
						{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
					] } }
				] } },
				{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
				{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } },
				{ "label": "Style", "type": "node", "data": { "name": "style", "errorCatcher": true, "content": [ 
<?php
	include("../../xmleditor_data/style.php");
?>
				] } }
			] } }
		] } }
	] },
	{ "label": "Language manager", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/languageManager.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "content": [ 
				{ "label": "Languages", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "language", "content": [ 
						{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } },
						{ "label": "Priority", "type": "node", "data": { "name": "priority", "content": [ { "type": "text" } ] } }
					] } }
				] } },			
				{ "label": "Items", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "item", "content": [ 
						{ "label": "Id", "type": "node", "data": { "name": "id", "content": [ { "type": "text" } ] } },
						{ "label": "Language", "type": "node", "data": { "name": "language", "content": [ { "type": "text" } ] } },
						{ "label": "Text", "type": "node", "data": { "name": "text", "content": [ { "type": "text" } ] } },
						{ "label": "Audio asset", "type": "node", "data": { "name": "audioAsset", "content": [ { "type": "asset" } ] } },
						{ "label": "Video asset", "type": "node", "data": { "name": "videoAsset", "content": [ { "type": "asset" } ] } },
						{ "label": "Image asset", "type": "node", "data": { "name": "imageAsset", "content": [ { "type": "asset" } ] } }
					] } }
				] } }	
			] } }
		] } }
	] },
	{ "label": "Timer", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/timer.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "content": [
				{ "label": "Interval (seconds, 0 = every frame)", "type": "node", "data": { "name": "intervalValue", "content": [
<?php
	include("value.php");
?>
				] } },
				{ "label": "Repeats (0 = infinite)", "type": "node", "data": { "name": "repeatsValue", "content": [
<?php
	include("value.php");
?>
				] } },
				{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "cue", "content": [ 
						{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
						{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
					] } }
				] } },
				{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } }
			] } }
		] } }
	] },
	{ "label": "Magicast", "color": "#3c84d1", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/magicast.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "magicast" } ] } },
				{ "label": "Magicast ID", "type": "node", "data": { "name": "id", "content": [ { "type": "object", "data": { "class": "Magicast" } } ] } }
			] } }
		] } }
	] },
	{ "label": "WebView (AIR)", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/webView.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "URL", "type": "node", "data": { "name": "url", "content": [ { "type": "text" } ] } }
			] } }
		] } }
	] },
	{ "label": "Dummy", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/dummy.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "content": [ 
				{ "label": "Text", "type": "node", "data": { "name": "text", "content": [ { "type": "text", "data": { "multiline": true } } ] } },
				{ "label": "Button?", "type": "node", "data": { "name": "button", "content": [ { "type": "boolean" } ] } }
			] } }
		] } }
	] }
] } }
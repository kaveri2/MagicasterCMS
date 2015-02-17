{ "type": "select", "data": { "options": [
	{ "label": "Video", "color": "#cab426", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/video.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } },
				{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "cue", "content": [ 
						{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
						{ "label": "Event to trigger", "type": "node", "data": { "name": "eventName", "content": [ { "type": "text" } ] } }
					] } }
				] } },
				{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
				{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } }
			] } }
		] } }
	] },
	{ "label": "Audio", "color": "#53b257", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/audio.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Random options", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "randomOption", "content": [ 
						{ "label": "Weight", "type": "attribute", "data": { "name": "weight", "content": [ { "type": "text" } ] } },
						{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } },
						{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
							{ "type": "node", "data": { "name": "cue", "content": [ 
								{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
								{ "label": "Event to trigger", "type": "node", "data": { "name": "eventName", "content": [ { "type": "text" } ] } }
							] } }
						] } }
					] } }
				] } },
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } },
				{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "cue", "content": [ 
						{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
						{ "label": "Event to trigger", "type": "node", "data": { "name": "eventName", "content": [ { "type": "text" } ] } }
					] } }
				] } },
				{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
				{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } }
			] } }
		] } }
	] },
	{ "label": "Image", "color": "#3c84d1", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/image.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } },
				{ "type": "node", "data": { "name": "variable", "content": [ 
					{ "label": "Variable name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
				] } },
				{ "label": "Style", "type": "node", "data": { "name": "style", "errorCatcher": true, "content": [ 
<?
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
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } },
				{ "label": "Frames per second", "type": "node", "data": { "name": "fps", "content": [ { "type": "text" } ] } },
				{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "cue", "content": [ 
						{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
						{ "label": "Event to trigger", "type": "node", "data": { "name": "eventName", "content": [ { "type": "text" } ] } }
					] } }
				] } },
				{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
				{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } },
				{ "label": "Style", "type": "node", "data": { "name": "style", "errorCatcher": true, "content": [ 
<?
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
				{ "label": "Delay (ms)", "type": "node", "data": { "name": "delay", "content": [ { "type": "text" } ] } },
				{ "label": "Repeat Count (0 = infinite)", "type": "node", "data": { "name": "repeat", "content": [ { "type": "text" } ] } },
				{ "label": "Triggered Event", "type": "node", "data": { "name": "triggerEvent", "content": [ { "type": "text" } ] } },
				{ "label": "Completed Event (defaults to 'complete')", "type": "node", "data": { "name": "completeEvent", "content": [ { "type": "text" } ] } },
				{ "label": "Stopped?", "type": "node", "data": { "name": "startStopped", "content": [ { "type": "boolean" } ] } }
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
	{ "label": "WebView (app)", "content": [
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
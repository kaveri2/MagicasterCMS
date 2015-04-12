{ "type": "select", "data": { "options": [
	{ "label": "YouTube", "color": "#cab426", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "components/2015/youtube.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
			{ "label": "Video ID", "type": "node", "data": { "name": "videoId", "content": [ { "type": "text" } ] } },
			{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
				{ "type": "node", "data": { "name": "cue", "content": [ 
					{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
					{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
				] } }
			] } },
			{ "label": "Start Time", "type": "node", "data": { "name": "startTime", "content": [ { "type": "text" } ] } },
			{ "label": "End Time", "type": "node", "data": { "name": "endTime", "content": [ { "type": "text" } ] } },
			{ "label": "Controls?", "type": "node", "data": { "name": "controls", "content": [ { "type": "boolean" } ] } },
			{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
			{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } },
			{ "label": "Preview?", "type": "node", "data": { "name": "preview", "content": [ { "type": "boolean" } ] } }
		] } }
	] },
	{ "label": "Areena", "color": "#cab426", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "source" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "components/2015/areena.js", "hint": {"failure": true, "success": true} } ] } }
		] } },
		{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
			{ "label": "ID", "type": "node", "data": { "name": "id", "content": [ { "type": "text" } ] } },
			{ "label": "Cuepoints", "type": "list", "data": { "content": [ 
				{ "type": "node", "data": { "name": "cue", "content": [ 
					{ "label": "Time (seconds)", "type": "node", "data": { "name": "time", "content": [ { "type": "text" } ] } },
					{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
				] } }
			] } },
			{ "label": "Start Time", "type": "node", "data": { "name": "startTime", "content": [ { "type": "text" } ] } },
			{ "label": "End Time", "type": "node", "data": { "name": "endTime", "content": [ { "type": "text" } ] } },
			{ "label": "Controls?", "type": "node", "data": { "name": "controls", "content": [ { "type": "boolean" } ] } },
			{ "label": "Loop?", "type": "node", "data": { "name": "loop", "content": [ { "type": "boolean" } ] } },
			{ "label": "Paused?", "type": "node", "data": { "name": "paused", "content": [ { "type": "boolean" } ] } },
			{ "label": "Preview?", "type": "node", "data": { "name": "preview", "content": [ { "type": "boolean" } ] } }
		] } }
	] }
] } }
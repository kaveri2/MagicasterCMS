{ "type": "select", "data": { "options": [
	{ "label": "Broadcast event sender / send", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "send" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
			{ "label": "Parameters", "type": "node", "data": { "name": "parameters", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
		] } }
	] }
] } }
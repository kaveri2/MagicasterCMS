{ "type": "select", "data": { "options": [
	{ "label": "Global", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "global" } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
	] },
	{ "label": "Local", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "local" } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
	] }
] } },
{ "label": "Source object?", "type": "node", "data": { "name": "source", "content": [ { "type": "boolean" } ] } },
{ "label": "Target object?", "type": "node", "data": { "name": "target", "content": [ { "type": "boolean" } ] } }
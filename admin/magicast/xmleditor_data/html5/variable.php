{ "type": "select", "data": { "options": [
	{ "label": "Global", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "global" } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
	] },
	{ "label": "Local", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "local" } ] } },
		{ "label": "Magicast (empty = this)", "type": "node", "data": { "name": "magicast", "content": [ { "type": "text" } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
	] }
] } }

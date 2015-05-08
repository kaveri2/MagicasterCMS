{ "type": "select", "data": { "options": [
	{ "label": "Global", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "global", "hint": { "failure": true, "success": true } } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
	] }, 
	{ "label": "Magicast", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "magicast", "hint": { "failure": true, "success": true } } ] } },
		{ "label": "Magicast (empty = this)", "type": "node", "data": { "name": "magicast", "content": [ { "type": "text" } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
	] }, 
	{ "label": "Layer", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "layer", "hint": { "failure": true, "success": true } } ] } },
		{ "label": "Magicast (empty = this)", "type": "node", "data": { "name": "magicast", "content": [ { "type": "text" } ] } },
		{ "label": "Layer (empty = this)", "type": "node", "data": { "name": "layer", "content": [ { "type": "text" } ] } },
		{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
	] } 
] } }

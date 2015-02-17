{ "type": "select", "data": { "options": [
	{ "label": "Change Background Magicast", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeBackgroundMagicast" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [
			{ "label": "Magicast", "type": "node", "data": { "name": "magicast", "content": [ 
				{ "type": "node", "data": { "name": "id", "content": [ 
					{ "type": "object", "data": { "class": "Magicast" } } 
				] } }
			] } }
		] } }
	] },
	{ "label": "Change Foreground Magicast", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changeForegroundMagicast" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [
			{ "label": "Magicast", "type": "node", "data": { "name": "magicast", "content": [ 
				{ "type": "node", "data": { "name": "id", "content": [ 
					{ "type": "object", "data": { "class": "Magicast" } } 
				] } }
			] } }
		] } }
	] },
	{ "label": "Remove Loader", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "removeLoader" } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [
		] } }
	] }
] } }
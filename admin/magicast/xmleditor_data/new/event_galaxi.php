{ "type": "select", "data": { "options": [
	{ "label": "Suojis / Appear", "content": [
		{ "type": "node", "data": { "name": "level", "content": [ { "type": "constant", "data": "global" } ] } },
		{ "type": "node", "data": { "name": "name", "content": [ { "type": "constant", "data": "suojis_appear" } ] } },
		{ "label": "Text", "type": "node", "data": { "name": "argument", "content": [
			{ "type": "node", "data": { "name": "name", "content": [ { "type": "constant", "data": "text" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
		] } },
		{ "label": "Mood", "type": "node", "data": { "name": "argument", "content": [
			{ "type": "node", "data": { "name": "name", "content": [ { "type": "constant", "data": "mood" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
		] } }
	] }
] } }

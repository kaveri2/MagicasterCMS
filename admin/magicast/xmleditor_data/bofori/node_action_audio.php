{ "type": "select", "data": { "options": [
	{ "label": "Play sound", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "playSound", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "ID", "type": "node", "data": { "name": "id", "content": [ { "type": "text", "data": { "options": [
				{ "label": "select", "value": "select" }
			] } } ] } },
			{ "label": "Volume (%)", "type": "node", "data": { "name": "volume", "content": [ { "type": "text" } ] } }
		] } }
	] },
	{ "label": "Play sound asset", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "playSoundAsset", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } },
			{ "label": "Volume (%)", "type": "node", "data": { "name": "volume", "content": [ { "type": "text" } ] } }
		] } }
	] },
	{ "label": "Play random sound asset", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "playRandomSoundAsset", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "list", "data": { "content": [ 
				{ "label": "Weight", "type": "node", "data": { "name": "weight", "content": [ { "type": "text" } ] } },
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "asset" } ] } },
				{ "label": "Volume (%)", "type": "node", "data": { "name": "volume", "content": [ { "type": "text" } ] } }
			] } }
		] } }
	] },
	{ "label": "Play music", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "playMusic", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "ID", "type": "node", "data": { "name": "id", "content": [ { "type": "text", "data": { "options": [
			] } } ] } }
		] } }
	] },
	{ "label": "Stop music", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "stopMusic", "hint": {"failure": true, "success": true} } ] } }
	] }
] } }
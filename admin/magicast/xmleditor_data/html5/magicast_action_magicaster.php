{ "type": "select", "data": { "options": [
	{ "label": "Send analytics", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "sendAnalytics", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Event", "type": "node", "data": { "name": "event", "content": [ { "type": "text", "data": {"multiline": false } } ] } },
			{ "label": "Label", "type": "node", "data": { "name": "label", "content": [ { "type": "text", "data": {"multiline": false } } ] } },
			{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text", "data": {"multiline": false } } ] } }
		] } }
	] },
	{ "label": "Grant session access", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "grantSessionAccess", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "SessionAccess" } ] } },
			{ "label": "Access", "type": "node", "data": { "name": "id", "content": [ { "type": "access" } ] } }
		] } }
	] },
	{ "label": "Send broadcast message", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "sendBroadcastMessage", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Channel", "type": "node", "data": { "name": "channel", "content": [ { "type": "text", "data": {"multiline": false } } ] } },
			{ "label": "Data", "type": "node", "data": { "name": "data", "content": [ { "type": "text", "data": {"multiline": true } } ] } }
		] } }
	] },
	{ "label": "Change path", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "changePath", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": {"multiline": false } } ] } }
		] } }
	] }
] } }
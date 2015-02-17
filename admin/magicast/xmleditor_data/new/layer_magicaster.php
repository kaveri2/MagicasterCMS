{ "type": "select", "data": { "options": [
	{ "label": "Broadcast event receiver", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/broadcastEventReceiver.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Channel", "type": "node", "data": { "name": "channel", "content": [ { "type": "text" } ] } }
			] } }
		] } }
	] },
	{ "label": "Broadcast event sender", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/broadcastEventSender.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Channel", "type": "node", "data": { "name": "channel", "content": [ { "type": "text" } ] } }
			] } }
		] } }
	] }
] } }
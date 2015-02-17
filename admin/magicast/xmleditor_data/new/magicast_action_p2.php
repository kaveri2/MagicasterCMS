{ "type": "select", "data": { "options": [
	{ "label": "Open Main Magicast", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "openMainMagicast", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "Magicast" } ] } },
			{ "label": "ID", "type": "node", "data": { "name": "id", "content": [ { "type": "object", "data": { "class": "Magicast" } } ] } },
			{ "label": "Data", "type": "node", "data": { "name": "data", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
		] } }
	] },
	{ "label": "Open Popup Magicast", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "openPopupMagicast", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "Magicast" } ] } },
			{ "label": "Width (px)", "type": "node", "data": { "name": "width", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
			{ "label": "Height (px)", "type": "node", "data": { "name": "height", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
			{ "label": "ID", "type": "node", "data": { "name": "id", "content": [ { "type": "object", "data": { "class": "Magicast" } } ] } },
			{ "label": "Data", "type": "node", "data": { "name": "data", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
		] } }
	] },
	{ "label": "Close Magicast", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "closeMagicast", "hint": {"failure": true, "success": true} } ] } }
	] },
	{ "label": "Open UGC", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "openUGC", "hint": {"failure": true, "success": false} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "node", "data": { "name": "mode", "content": [ { "type": "constant", "data": "view" } ] } },
			{ "type": "node", "data": { "name": "UGC_item", "content": [ 
				{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "UGC_Item" } ] } },
				{ "label": "UGC Item ID", "type": "node", "data": { "name": "id", "content": [ { "type": "text", "data": { "multiline": false } } ] } }
			] } }
		] } }
	] },
	{ "label": "Send UGC", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "openUGC", "hint": {"failure": true, "success": false} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "type": "node", "data": { "name": "mode", "content": [ { "type": "constant", "data": "send" } ] } },
			{ "type": "Format", "data": { "name": "format", "content": [ { "type": "text", "data": { "options": [
				{ "label": "png", "value": "png" },
				{ "label": "jpg", "value": "jpg" }
			] } } ] } },
			{ "label": "Variable", "type": "node", "data": { "name": "variable", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
			{ "type": "node", "data": { "name": "UGC_context", "content": [ 
				{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "UGC_Context" } ] } },
				{ "label": "UGC Context ID", "type": "node", "data": { "name": "id", "content": [ { "type": "object", "data": { "class": "UGC_Context" } } ] } }
			] } },
			{ "type": "node", "data": { "name": "UGC_sentItemType", "content": [ 
				{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "UGC_SentItemType" } ] } },
				{ "label": "UGC Sent Item Type ID", "type": "node", "data": { "name": "id", "content": [ { "type": "object", "data": { "class": "UGC_SentItemType" } } ] } }
			] } }
		] } }
	] },
	{ "label": "Open System Dialog", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "openSystemDialog", "hint": {"failure": true, "success": true} } ] } },
		{ "type": "node", "data": { "name": "parameters", "content": [ 
			{ "label": "Title", "type": "node", "data": { "name": "title", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
			{ "label": "Message", "type": "node", "data": { "name": "message", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
		] } }
	] },
	{ "label": "Open Home", "content": [
		{ "type": "node", "data": { "name": "method", "content": [ { "type": "constant", "data": "openHome", "hint": {"failure": true, "success": true} } ] } }
	] }
] } }
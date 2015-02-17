{ "type": "select", "data": { "options": [
	{ "label": "Default", "content": [
		{ "type": "asset" }
	] },
	{ "label": "Random", "content": [
		{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "random", "hint": { "failure": true, "success": true } } ] } },
		{ "type": "node", "data": { "name": "value", "content": [ 
			{ "label": "Options", "type": "list", "data": { "content": [
				{ "type": "node", "data": { "name": "option", "content": [ 
					{ "label": "Weight", "type": "node", "data": { "name": "weight", "content": [ { "type": "text" } ] } },
					{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ 
						{ "type": "include", "data": { "url": "xmleditor_data/new/include_asset.php" } }
					] } }
				] } }
			] } }
		] } }
	] },
	{ "label": "Conditional", "content": [
		{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "conditional", "hint": { "failure": true, "success": true } } ] } },
		{ "type": "node", "data": { "name": "value", "content": [ 
			{ "label": "Cases", "type": "list", "data": { "content": [ 
				{ "type": "node", "data": { "name": "case", "content": [ 
					{ "label": "Conditions", "type": "list", "data": { "content": [ 
						{ "type": "node", "data": { "name": "condition", "content": [ 
							{ "label": "Operator", "type": "node", "data": { "name": "operator", "content": [ { "type": "text", "data": { "options": [
								{ "label": "==", "value": "eq" },
								{ "label": "!=", "value": "ne" },
								{ "label": ">", "value": "gt" },
								{ "label": "<", "value": "lt" },
								{ "label": "IS NULL", "value": "isNull" },
								{ "label": "IS NOT NULL", "value": "isNotNull" }
							] } } ] } },
							{ "label": "Values", "type": "list", "data": { "content": [
								{ "type": "node", "data": { "name": "value", "content": [ 
									{ "type": "include", "data": { "url": "xmleditor_data/new/include_value.php" } }
								] } }
							] } }
						] } }
					] } },
					{ "label": "Value", "type": "node", "data": { "name": "value", "content": [
						{ "type": "include", "data": { "url": "xmleditor_data/new/include_asset.php" } }
					] } }
				] } }
			] } }
		] } }
	] }
] } }

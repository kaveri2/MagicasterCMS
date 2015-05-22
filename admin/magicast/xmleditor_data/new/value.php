{ "type": "select", "data": { "options": [
	{ "label": "Empty", "content": [
	] },	
	{ "label": "Constant", "content": [
		{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "constant", "hint": { "failure": true, "success": true } } ] } },
		{ "type": "node", "data": { "name": "value", "content": [ 
			{ "type": "text", "data": { "multiline": true } } 
		] } }
	] },	
	{ "label": "Variable", "content": [
		{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "variable", "hint": { "failure": true, "success": true } } ] } },
		{ "type": "node", "data": { "name": "value", "content": [ 
<?php
	include("variable.php");
?>
		] } }
	] },	
	{ "label": "Property", "content": [
		{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "property", "hint": { "failure": true, "success": true } } ] } },
		{ "type": "node", "data": { "name": "value", "content": [ 
<?php
	include("property.php");
?>
		] } }
	] },	
	{ "label": "Event argument", "content": [
		{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "eventArgument", "hint": { "failure": true, "success": true } } ] } },
		{ "type": "node", "data": { "name": "value", "content": [ 
			{ "label": "Name", "type": "text" } 
		] } }
	] },
	{ "label": "Random", "content": [
		{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "random", "hint": { "failure": true, "success": true } } ] } },
		{ "type": "node", "data": { "name": "value", "content": [ 
			{ "label": "Options", "type": "list", "data": { "content": [
				{ "type": "node", "data": { "name": "option", "content": [ 
					{ "label": "Weight", "type": "node", "data": { "name": "weight", "content": [ { "type": "text" } ] } },
					{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ 
						{ "type": "include", "data": { "url": "xmleditor_data/new/include_value.php" } }
					] } }
				] } }
			] } }
		] } }
	] },
	{ "label": "Calculation", "content": [
		{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "calculation", "hint": { "failure": true, "success": true } } ] } },
		{ "type": "node", "data": { "name": "value", "content": [ 
			{ "label": "Function", "type": "node", "data": { "name": "function", "content": [ { "type": "text", "data": { "options": [
				{ "label": "add", "value": "add" },
				{ "label": "dec", "value": "dec" },
				{ "label": "mul", "value": "mul" },
				{ "label": "div", "value": "div" },
				{ "label": "concat", "value": "concat" },
				{ "label": "random", "value": "random" }
			] } } ] } },
			{ "label": "Values", "type": "list", "data": { "content": [
				{ "type": "node", "data": { "name": "value", "content": [ 
					{ "type": "include", "data": { "url": "xmleditor_data/new/include_value.php" } }
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
						{ "type": "include", "data": { "url": "xmleditor_data/new/include_value.php" } }
					] } }
				] } }
			] } }
		] } }
	] }
] } }

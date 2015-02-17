{ "type": "select", "data": { "options": [
	{ "label": "(Drawing) Canvas", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/ugc/canvas.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 			
				{ "label": "Image", "type": "select", "data": { "options": [
					{ "label": "Asset", "content": [
						{ "type": "node", "data": { "name": "imageAsset", "content":  [ { "type": "asset" } ] } }
					] },
					{ "label": "Value", "content": [
						{ "type": "node", "data": { "name": "imageValue", "content":  [
<?
	include("value.php");
?>
						] } }
					] }
				] } },
				{
					"label": "Color",
					"type": "node",
					"data":
					{
						"name": "color",
						"content":
						[
							{
								"type": "text"
							}
						]
					}
				},
				{
					"label": "Alpha (%)",
					"type": "node",
					"data":
					{
						"name": "alpha",
						"content":
						[
							{
								"type": "text"
							}
						]
					}
				},
				{
					"label": "Thickness (px)",
					"type": "node",
					"data":
					{
						"name": "thickness",
						"content":
						[
							{
								"type": "text"
							}
						]
					}
				},
				{
					"label": "Erase?",
					"type": "node",
					"data":
					{
						"name": "erase",
						"content":
						[
							{
								"type": "text"
							}
						]
					}
				}
			] } }
		] } }
	] },	
	{ "label": "Camera", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/camera.swf" } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 			
				
				{
					"label": "Position",
					"type": "node",
					"data":
					{
						"name": "position",
						"content":
						[
							{
								"type": "text",
								"data": { "options": [
									{ "label": "front", "value": "front" },
									{ "label": "back", "value": "back" }
								] }
							}
						]
					}
				},				
				{
					"label": "Witdh (px)",
					"type": "node",
					"data":
					{
						"name": "width",
						"content":
						[
							{
								"type": "text"
							}
						]
					}
				},
				{
					"label": "Height (px)",
					"type": "node",
					"data":
					{
						"name": "height",
						"content":
						[
							{
								"type": "text"
							}
						]
					}
				},
				{
					"label": "Frames per second",
					"type": "node",
					"data":
					{
						"name": "fps",
						"content":
						[
							{
								"type": "text"
							}
						]
					}
				},
				{
					"label": "Quality",
					"type": "node",
					"data":
					{
						"name": "quality",
						"content":
						[
							{
								"type": "text"
							}
						]
					}
				},
				{ "label": "Thresholds", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "threshold", "content": [ 
						{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
						{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "multiline": false } } ] } }					
					] } }
				] } }				
			] } }
		] } }
	] },
	{ "label": "Microphone", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/microphone.swf" } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 						
				{
					"label": "Loop back?",
					"type": "node",
					"data":
					{
						"name": "loopBack",
						"content":
						[
							{
								"type": "boolean"
							}
						]
					}
				},
				{
					"label": "Echo suppression?",
					"type": "node",
					"data":
					{
						"name": "echoSuppression",
						"content":
						[
							{
								"type": "boolean"
							}
						]
					}
				},				
				{ "label": "Thresholds", "type": "list", "data": { "content": [ 
					{ "type": "node", "data": { "name": "threshold", "content": [ 
						{ "label": "Value", "type": "node", "data": { "name": "value", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
						{ "label": "Name", "type": "node", "data": { "name": "event", "content": [ { "type": "text" } ] } }
					] } }
				] } }
			] } }
		] } }
	] }
] } }

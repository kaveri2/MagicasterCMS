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
<?php
	include("value.php");
?>
						] } }
					] }
				] } },
				{
					"label": "Color (uint)",
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
					"label": "Blend mode (normal, erase, etc.)",
					"type": "node",
					"data":
					{
						"name": "blendMode",
						"content":
						[
							{
								"type": "text",
								"data": { "options": [
									{ "label": "add", "value": "add" },
									{ "label": "alpha", "value": "alpha" },
									{ "label": "darken", "value": "darken" },
									{ "label": "difference", "value": "difference" },
									{ "label": "erase", "value": "erase" },
									{ "label": "hardlight", "value": "hardlight" },
									{ "label": "invert", "value": "invert" },
									{ "label": "layer", "value": "layer" },
									{ "label": "lighten", "value": "lighten" },
									{ "label": "multiply", "value": "multiply" },
									{ "label": "normal", "value": "normal" },
									{ "label": "overlay", "value": "overlay" },
									{ "label": "screen", "value": "screen" },
									{ "label": "shader", "value": "shader" },
									{ "label": "substract", "value": "substract" }
								] }
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
						{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } }
					] } }
				] } }
			] } }
		] } }
	] }
] } }

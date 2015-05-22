{ "type": "node", "data": { "name": "asset", "content": [ 
	{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
	{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/game/puzzle.swf", "hint": {"failure": true, "success": true} } ] } },
	{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
		{
			"label": "Image",
			"type": "node",
			"data":
			{
				"name": "imageAsset",
				"content":
				[
					{
						"type": "asset",
						"data": {}
					}
				]
			}
		},
		{
			"label": "Rows",
			"type": "node",
			"data":
			{
				"name": "rows",
				"content":
				[
					{
						"type": "text"
					}
				]
			}
		},
		{
			"label": "Cols",
			"type": "node",
			"data":
			{
				"name": "cols",
				"content":
				[
					{
						"type": "text"
					}
				]
			}
		},		
		{ "label": "Background alpha (%)", "type": "node", "data": { "name": "backgroundAlpha", "content": [ { "type": "text" } ] } },
		{ "label": "Style (draggable)", "type": "node", "data": { "name": "draggableStyle", "errorCatcher": true, "content": [ 
<?php
	include("../../xmleditor_data/style.php");
?>
		] } },
		{ "label": "Style (dragged)", "type": "node", "data": { "name": "draggedStyle", "errorCatcher": true, "content": [ 
<?php
	include("../../xmleditor_data/style.php");
?>
		] } }
	] } }
] } }
{ "type": "node", "data": { "name": "asset", "content": [ 
	{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
	{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/game/drag.swf", "hint": {"failure": true, "success": true} } ] } },
	{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 					
		{ "label": "Style", "type": "node", "data": { "name": "style", "errorCatcher": true, "content": [ 
<?
	include("../../xmleditor_data/style.php");
?>
		] } },		
		{ "label": "Style (clickable)", "type": "node", "data": { "name": "clickableStyle", "errorCatcher": true, "content": [ 
<?
	include("../../xmleditor_data/style.php");
?>
		] } },
		{ "label": "Style (clicked)", "type": "node", "data": { "name": "clickedStyle", "errorCatcher": true, "content": [ 
<?
	include("../../xmleditor_data/style.php");
?>
		] } },
		{ "label": "Style (draggable)", "type": "node", "data": { "name": "draggableStyle", "errorCatcher": true, "content": [ 
<?
	include("../../xmleditor_data/style.php");
?>
		] } },
		{ "label": "Style (dragged)", "type": "node", "data": { "name": "draggedStyle", "errorCatcher": true, "content": [ 
<?
	include("../../xmleditor_data/style.php");
?>
		] } },
		
		{ "label": "Style (complete)", "type": "node", "data": { "name": "completeStyle", "errorCatcher": true, "content": [ 
<?
	include("../../xmleditor_data/style.php");
?>
		] } },
		{
			"label": "Random success sounds",
			"type": "list",
			"data": 
			{
				"content":
				[
					{
						"type": "node",
						"data": 
						{
							"errorCatcher": true,
							"name": "successSoundAsset",
							"content": 
							[
								{
									"type": "asset"
								}				
							]
						}
					}
				]
			}
		},
		{
			"label": "Random failure sounds",
			"type": "list",
			"data": 
			{
				"content":
				[
					{
						"type": "node",
						"data": 
						{
							"errorCatcher": true,
							"name": "failureSoundAsset",
							"content": 
							[
								{
									"type": "asset"
								}				
							]
						}
					}
				]
			}
		},
		{
			"label": "Items",
			"type": "list",
			"data": 
			{
				"content":
				[
					{
						"type": "node",
						"data": 
						{
							"errorCatcher": true,
							"name": "item",
							"content": 
							[
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
									"label": "ID",
									"type": "node",
									"data": {
										"name": "id",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},
								{
									"label": "Target item ID",
									"type": "node",
									"data": {
										"name": "targetItemId",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},
								{
									"label": "X",
									"type": "node",
									"data": {
										"name": "x",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},
								{
									"label": "Y",
									"type": "node",
									"data": {
										"name": "y",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},
								{
									"label": "Reference X",
									"type": "node",
									"data": {
										"name": "referenceX",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},
								{
									"label": "Reference Y",
									"type": "node",
									"data": {
										"name": "referenceX",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},
								{
									"label": "Passive?",
									"type": "node",
									"data": {
										"name": "passive",
										"content":
										[
											{
												"type": "boolean"
											}
										]
									}
								},
								{
									"label": "Draggable?",
									"type": "node",
									"data": {
										"name": "draggable",
										"content":
										[
											{
												"type": "boolean"
											}
										]
									}
								},
								{
									"label": "Bounce back after failure?",
									"type": "node",
									"data": {
										"name": "bounceBack",
										"content":
										[
											{
												"type": "boolean"
											}
										]
									}
								},
								{
									"label": "Vanish after success?",
									"type": "node",
									"data": {
										"name": "targetVanish",
										"content":
										[
											{
												"type": "boolean"
											}
										]
									}
								},
								{
									"label": "Lock after success?",
									"type": "node",
									"data": {
										"name": "targetLock",
										"content":
										[
											{
												"type": "boolean"
											}
										]
									}
								},							
								{
									"label": "Lock X",
									"type": "node",
									"data": {
										"name": "targetLockX",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},
								{
									"label": "Lock Y",
									"type": "node",
									"data": {
										"name": "targetLockY",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},	
								{
									"label": "Success sound",
									"type": "node",
									"data": {
										"name": "successSoundAsset",
										"content":
										[
											{
												"type": "asset"
											}
										]
									}
								},
								{
									"label": "Failure sound",
									"type": "node",
									"data": {
										"name": "failureSoundAsset",
										"content":
										[
											{
												"type": "asset"
											}
										]
									}
								}				
							]
						}
					}
				]
			}
		}
	] } }
] } }
{ "type": "node", "data": { "name": "asset", "content": [ 
	{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
	{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/game/card.swf", "hint": {"failure": true, "success": true} } ] } },
	{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
		{ "label": "Randomize?", "type": "node", "data": { "name": "randomize", "errorCatcher": true, "content": [ { "type": "boolean" } ] } },
		{
			"label": "Rows",
			"type": "node",
			"data": 
			{
				"name": "rows",
				"content": 
				[
					{
						"type": "text",
						"data": {}
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
						"type": "text",
						"data": {}
					}
				]
			}
		},
		{ "label": "Selected image", "type": "select", "data": { "options": [
			{ "label": "Asset", "content": [
				{ "type": "node", "data": { "name": "selectedImageAsset", "content":  [ { "type": "asset" } ] } }
			] },
			{ "label": "Value", "content": [
				{ "type": "node", "data": { "name": "selectedImageValue", "content":  [
<?php
	include("value.php");
?>
				] } }
			] }
		] } },
		{ "label": "Back background image", "type": "select", "data": { "options": [
			{ "label": "Asset", "content": [
				{ "type": "node", "data": { "name": "backBackgroundImageAsset", "content":  [ { "type": "asset" } ] } }
			] },
			{ "label": "Value", "content": [
				{ "type": "node", "data": { "name": "backBackgroundImageValue", "content":  [
<?php
	include("value.php");
?>
				] } }
			] }
		] } },
		{ "label": "Front background image", "type": "select", "data": { "options": [
			{ "label": "Asset", "content": [
				{ "type": "node", "data": { "name": "frontBackgroundImageAsset", "content":  [ { "type": "asset" } ] } }
			] },
			{ "label": "Value", "content": [
				{ "type": "node", "data": { "name": "frontBackgroundImageValue", "content":  [
<?php
	include("value.php");
?>
				] } }
			] }
		] } },
		{ "label": "Style", "type": "node", "data": { "name": "style", "errorCatcher": true, "content": [ 
<?php
	include("../../xmleditor_data/style.php");
?>
		] } },
		{ "label": "Style (selected)", "type": "node", "data": { "name": "selectedStyle", "errorCatcher": true, "content": [ 
<?php
	include("../../xmleditor_data/style.php");
?>
		] } },
		{
			"label": "Success sound assets",
			"type": "list",
			"data": 
			{
				"content":
				[
					{
						"type": "node",
						"data": 
						{
							"name": "successSoundAsset",
							"content": 
							[
								{
									"type": "asset",
									"data": {}
								}
							]				
						}
					}
				]
			}
		},
		{
			"label": "Failure sound assets",
			"type": "list",
			"data": 
			{
				"content":
				[
					{
						"type": "node",
						"data": 
						{
							"name": "failureSoundAsset",
							"content": 
							[
								{
									"type": "asset",
									"data": {}
								}
							]
						}
					}
				]
			}
		},
		{
			"label": "Elements",
			"type": "list",
			"data": 
			{
				"headerSelector": "input:eq(0)",
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
									"label": "Key",
									"type": "node",
									"data": {
										"name": "key",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},								
								{ "label": "Back image", "type": "select", "data": { "options": [
									{ "label": "Asset", "content": [
										{ "type": "node", "data": { "name": "backImageAsset", "content":  [ { "type": "asset" } ] } }
									] },
									{ "label": "Value", "content": [
										{ "type": "node", "data": { "name": "backImageValue", "content":  [
<?php
	include("value.php");
?>
										] } }
									] }
								] } },
								{ "label": "Front image", "type": "select", "data": { "options": [
									{ "label": "Asset", "content": [
										{ "type": "node", "data": { "name": "frontImageAsset", "content":  [ { "type": "asset" } ] } }
									] },
									{ "label": "Value", "content": [
										{ "type": "node", "data": { "name": "frontImageValue", "content":  [
<?php
	include("value.php");
?>
										] } }
									] }
								] } },
								{
									"label": "Selected sound asset",
									"type": "node",
									"data": {
										"name": "selectedSoundAsset",
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
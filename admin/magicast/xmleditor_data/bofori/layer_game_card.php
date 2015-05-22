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
		{
			"label": "Valitun symbolin kuva",
			"type": "node",
			"data": 
			{
				"name": "selectedImageAsset",
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
			"label": "Korttien kääntöpuolen taustakuva",
			"type": "node",
			"data": 
			{
				"name": "backBackgroundImageAsset",
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
			"label": "Korttien etupuolen taustakuva",
			"type": "node",
			"data": 
			{
				"name": "frontBackgroundImageAsset",
				"content": 
				[
					{
						"type": "asset",
						"data": {}
					}
				]
			}
		},
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
			"label": "Onnitteluäänet",
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
			"label": "Valitteluäänet",
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
			"label": "Elementit",
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
									"label": "Avain",
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
								{
									"label": "Takapuolen kuva",
									"type": "node",
									"data": {
										"name": "backImageAsset",
										"content":
										[
											{
												"type": "asset"
											}
										]
									}
								},
								{
									"label": "Etupuolen kuva",
									"type": "node",
									"data": {
										"name": "frontImageAsset",
										"content":
										[
											{
												"type": "asset"
											}
										]
									}
								},

								{
									"label": "Ääni, joka soitetaan kun kortti on valittu",
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
								},
								
								{
									"label": "Eventti, joka ammutaan kun klikattava kortti on väärä",
									"type": "node",
									"data": {
										"name": "failureEventName",
										"content":
										[
											{
												"type": "text"
											}
										]
									}
								},
								
								{
									"label": "Eventti, joka ammutaan kun klikattava kortti on oikea",
									"type": "node",
									"data": {
										"name": "successEventName",
										"content":
										[
											{
												"type": "text"
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
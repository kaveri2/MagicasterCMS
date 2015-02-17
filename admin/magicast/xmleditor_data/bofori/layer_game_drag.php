{ "type": "node", "data": { "name": "asset", "content": [ 
	{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
	{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/game/drag.swf", "hint": {"failure": true, "success": true} } ] } },
	{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 					
		
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
			"label": "Ääniä, joita soitetaan satunnaisesti kun raahaus osuu maaliin",
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
			"label": "Ääniä, joita soitetaan satunnaisesti kun raahaus ei osu maaliin",
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
			"label": "Elementit",
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
								{
									"label": "Kuva",
									"type": "node",
									"data": {
										"name": "imageAsset",
										"content":
										[
											{
												"type": "asset"
											}
										]
									}
								},
								
								
								{
									"label": "Tunniste",
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
									"label": "Kohteen tunniste",
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
									"label": "X-koordinaatti",
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
									"label": "Y-koordinaatti",
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
									"label": "Keskipisteen X-koordinaatti",
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
									"label": "Keskipisteen Y-koordinaatti",
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
									"label": "Onko passiivinen?",
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
									"label": "Onko raahattava?",
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
									"label": "Pomppaako takaisin lähtöpisteeseen kun raahaus loppuu?",
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
									"label": "Katoaako kun raahataan kohteeseen?",
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
									"label": "Lukkiutuuko kun raahataan kohteeseen?",
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
									"label": "Lukituksen X-koordinaatti",
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
									"label": "Lukituksen Y-koordinaatti",
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
									"label": "Ääni, joka soitetaan kun raahaus osuu maaliin",
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
									"label": "Eventti, joka ammutaan kun raahaus osuu maaliin",
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
								},
								{
									"label": "Ääni, joka soitetaan kun raahaus ei osu maaliin",
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
								},
								{
									"label": "Eventti, joka ammutaan kun raahaus ei osu maaliin",
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
								}				
							]
						}
					}
				]
			}
		}
	] } }
] } }
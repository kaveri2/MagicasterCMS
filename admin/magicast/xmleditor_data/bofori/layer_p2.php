{ "type": "select", "data": { "options": [
	{ "label": "Etusivu / Content Icon", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/etusivu/contentIcon.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Color", "type": "node", "data": { "name": "color", "content": [ { "type": "text","data": { "options": [
<?php
	include('../../xmleditor_data/p2_color_options.php');
?>
				] } } ] } },
				{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
				{ "label": "Image", "type": "node", "data": { "name": "imageAsset", "content": [ { "type": "asset" } ] } },
				{ "type": "node", "data": { "name": "popupMagicast", "content": [ 
					{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "Magicast" } ] } },
					{ "label": "Popup Magicast Width (px)", "type": "node", "data": { "name": "width", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
					{ "label": "Popup Magicast Height (px)", "type": "node", "data": { "name": "height", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
					{ "label": "Popup Magicast ID", "type": "node", "data": { "name": "id", "content": [ { "type": "object", "data": { "class": "Magicast" } } ] } },
					{ "label": "Popup Magicast Data", "type": "node", "data": { "name": "data", "content": [ { "type": "text", "data": { "multiline": true } } ] } },
					{ "type": "node", "data": { "name": "bar", "content": [ 
						{ "label": "Popup Magicast Bar Color", "type": "node", "data": { "name": "color", "content": [ { "type": "text","data": { "options": [
<?php
	include('../../xmleditor_data/p2_color_options.php');
?>
						] } } ] } },
						{ "label": "Popup Magicast Bar Icon Image", "type": "node", "data": { "name": "iconImageAsset", "content": [ { "type": "asset" } ] } },
						{ "label": "Popup Magicast Bar Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "multiline": true } } ] } },
						{ "label": "Popup Magicast Bar Actions", "type": "list", "data": { "content": [
							{ "type": "node", "data": { "name": "action", "content": [
								{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
								{ "label": "Type", "type": "node", "data": { "name": "type", "content": [ { "type": "text", "data": { "options": [
<?php
	include('../../xmleditor_data/p2_action_type_options.php');
?>
								] } } ] } },
								{ "label": "Path", "type": "node", "data": { "name": "path", "content": [ { "type": "text", "data": { "multiline": false } } ] } }
							] } }
						] } }
					] } }
				] } }
			] } }
		] } }
	] },
	{ "label": "Leikit / Background Video Frame", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/nettilahetys/backgroundVideoFrame.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Texture Image", "type": "node", "data": { "name": "textureImageAsset", "content": [ { "type": "asset" } ] } },
				{ "label": "Texture Method", "type": "node", "data": { "name": "textureMethod", "content": [ { "type": "text", "data": { "options": [
					{ "label": "Tile", "value": "tile" },
					{ "label": "Crop", "value": "crop" },
					{ "label": "Stretch", "value": "stretch" }
				] } } ] } },
				{ "label": "Corner Radius (px)", "type": "node", "data": { "name": "cornerRadius", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
				{ "label": "Shadow Blur (px)", "type": "node", "data": { "name": "shadowBlur", "content": [ { "type": "text", "data": { "multiline": false } } ] } }
			] } }
		] } }
	] },
	{ "label": "Leikit / Floating Video Frame", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/nettilahetys/floatingVideoFrame.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
			
			{ "label": "Frame Color", "type": "node", "data": { "name": "color", "content": [ { "type": "text","data": { "options": [
					{ "label": "Red", "value": "red" },
					{ "label": "Blue", "value": "blue" },
					{ "label": "Orange", "value": "orange" }
			] } } ] } }
			
			] } }
		] } }
	] },
	{ "label": "Leikit / Flashlight", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2012/nettilahetys/flashlight.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 			
			] } }
		] } }
	] },	
	{ "label": "Posti / Postipyyntö", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/p2/postipyynto.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 	
				{ "label": "Otsikko", "type": "node", "data": { "name": "title", "content": [ { "type": "text", "data": { "multiline": false } } ] } },
				{ "label": "Postipyyntö", "type": "node", "data": { "name": "teksti", "content": [ { "type": "text", "data": { "multiline": true } } ] } },
				{"label": "Postipäiväys","type": "list","data": {"content":[{"type": "node","data": {"name": "postipaiva", "content": [{"type": "text","data": {"multiline": false}}]}}]}}
			] } }
		] } }
	] },
	{ "label": "UGC / Item", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/p2/UGC_item.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 			
				{ "type": "node", "data": { "name": "UGC_item", "content": [ 
					{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "UGC_Item" } ] } },
					{ "label": "UGC Item ID", "type": "node", "data": { "name": "id", "content": [ { "type": "text" } ] } }
				] } }
			] } }
		] } }
	] },
	{ "label": "UGC / Gallery", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/p2/UGC_gallery.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 			
				{ "type": "node", "data": { "name": "UGC_context", "content": [ 
					{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "UGC_Context" } ] } },
					{ "label": "UGC Context ID", "type": "node", "data": { "name": "id", "content": [ { "type": "object", "data": { "class": "UGC_Context" } } ] } }
				] } },
				{ "label": "Page (starting from 0)", "type": "node", "data": { "name": "page", "content": [ { "type": "text", "data": { "multiline": false } } ] } }
			] } }
		] } }
	] },
	{ "label": "Search", "content": [
		{ "type": "node", "data": { "name": "asset", "content": [ 
			{ "type": "node", "data": { "name": "type", "content": [ { "type": "constant", "data": "int" } ] } },
			{ "type": "node", "data": { "name": "value", "content": [ { "type": "constant", "data": "2013/p2/searcher.swf", "hint": {"failure": true, "success": true} } ] } },
			{ "type": "node", "data": { "name": "parameters", "errorCatcher": true, "content": [ 
				{ "label": "Filters", "type": "list", "data": { "content": [
					{ "type": "node", "data": { "name": "filter", "content": [ 					
						{ "type": "node", "data": { "name": "search_keyword", "content": [
							{ "type": "attribute", "data": { "name": "Magicaster_injectCheck", "content": [ { "type": "constant", "data": "search_Keyword" } ] } },
							{ "label": "Search Keyword ID", "type": "node", "data": { "name": "id", "content": [ { "type": "object", "data": { "class": "search_Keyword" } } ] } }
						] } },
						{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text", "data": { "multiline": false }  } ] } },
						{ "label": "Image", "type": "node", "data": { "name": "imageAsset", "content": [ { "type": "asset" } ] } }
					] } }
				] } }
			] } }
		] } }
	] }
] } }
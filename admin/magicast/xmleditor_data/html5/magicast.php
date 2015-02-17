	{ "label": "Debug?", "type": "node", "data": { "name": "debug", "content": [ { "type": "boolean" } ] } },
	{ "label": "Name", "type": "node", "data": { "name": "name", "content": [ { "type": "text" } ] } },
	{ "label": "Min width (px)", "type": "node", "data": { "name": "minWidth", "content": [ { "type": "text" } ] } },
	{ "label": "Min height (px)", "type": "node", "data": { "name": "minHeight", "content": [ { "type": "text" } ] } },
	{ "label": "Max width (px)", "type": "node", "data": { "name": "maxWidth", "content": [ { "type": "text" } ] } },
	{ "label": "Max height (px)", "type": "node", "data": { "name": "maxHeight", "content": [ { "type": "text" } ] } },
	{ "label": "Requirements [TODO]", "type": "list", "data": { "content": [ { "type": "node", "data": { "errorCatcher": true, "name": "requirement", "content": [
		{ "type": "text" } 
	] } } ] } },
	{ "label": "Fonts", "type": "list", "data": { "content": [ { "type": "node", "data": { "errorCatcher": true, "name": "font", "content": [
		{ "type": "select", "data": { "options": [
			{ "label": "Custom", "content": [
				{ "type": "node", "data": { "name": "source", "content": [ { "type": "constant", "data": "custom" } ] } },
				{ "label": "Family", "type": "node", "data": { "name": "family", "content": [ { "type": "text" } ] } },
				{ "label": "Asset", "type": "node", "data": { "name": "asset", "content": [ { "type": "text" } ] } }
			] },
			{ "label": "Fontdeck", "content": [
				{ "type": "node", "data": { "name": "source", "content": [ { "type": "constant", "data": "fontdeck" } ] } },
				{ "label": "Website ID", "type": "node", "data": { "name": "id", "content": [ { "type": "text" } ] } }
			] },
			{ "label": "Fonts.com", "content": [
				{ "type": "node", "data": { "name": "source", "content": [ { "type": "constant", "data": "monotype" } ] } },
				{ "label": "Project ID", "type": "node", "data": { "name": "projectId", "content": [ { "type": "text" } ] } }
			] },
			{ "label": "Google", "content": [
				{ "type": "node", "data": { "name": "source", "content": [ { "type": "constant", "data": "google" } ] } },
				{ "label": "Family", "type": "node", "data": { "name": "family", "content": [ { "type": "text" } ] } }
			] },
			{ "label": "Typekit", "content": [
				{ "type": "node", "data": { "name": "source", "content": [ { "type": "constant", "data": "typekit" } ] } },
				{ "label": "Kit ID", "type": "node", "data": { "name": "id", "content": [ { "type": "text" } ] } }
			] } 
		] } }
	] } } ] } },
	{ "label": "CSS Rules", "type": "list", "data": { "content": [ { "type": "node", "data": { "errorCatcher": true, "name": "cssRule", "content": [
		{ "label": "Selector", "type": "node", "data": { "name": "selector", "content": [ { "type": "text" } ] } },
		{ "label": "Declaration", "type": "node", "data": { "name": "declaration", "content": [ { "type": "text", "data": { "multiline": true } } ] } }
	] } } ] } },
	{ "label": "Nodes", "type": "list", "data": { "content": [ { "type": "node", "data": { "errorCatcher": true, "name": "node", "content": [
<?php
	include("node.php");
?>
	] } } ] } }
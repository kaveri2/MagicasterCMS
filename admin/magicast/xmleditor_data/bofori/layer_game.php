{ "type": "select", "data": { "options": [
	{ "label": "Dragging Game", "content": [
<?php
	include("layer_game_drag.php");
?>
	] },
	{ "label": "Card Game", "content": [
<?php
	include("layer_game_card.php");
?>
	] },
	{ "label": "Puzzle", "content": [
<?php
	include("layer_game_puzzle.php");
?>
	] }
] } }

<?
require_once("common.php");

$client_base_url = "/magicaster/client/";
$client_root = dirname(realpath(__DIR__)) . '/client/';

$CONFIG = array_merge($CONFIG, array(

	"users" => array(
		"magicaster" => "magicaster"
	),

	"base_url" =>  "/magicaster/admin/",

	"menu" => array(
		array(
			"label" => "Magicast",
			"links" => array(
				array(
					"label" => "Search",
					"url" => "magicast/search.php"
				),
				array(
					"label" => "Create",
					"url" => "magicast/save.php"
				)
			)
		),
		array(
			"label" => "Access",
			"links" => array(
				array(
					"label" => "Search",
					"url" => "access/search.php"
				),
				array(
					"label" => "Create",
					"url" => "access/save.php"
				)
			)
		),
		array(
			"label" => "Path",
			"links" => array(
				array(
					"label" => "Search",
					"url" => "path/search.php"
				),
				array(
					"label" => "Create",
					"url" => "path/save.php"
				)
			)
		),
		array(
			"label" => "Client",
			"links" => array(
				array(
					"label" => "Search",
					"url" => "client/search.php"
				),
				array(
					"label" => "Create",
					"url" => "client/save.php"
				)
			)
		),
		array(
			"label" => "UGC Context",
			"links" => array(
				array(
					"label" => "Search",
					"url" => "UGC_context/search.php"
				),
				array(
					"label" => "Create ",
					"url" => "UGC_context/save.php"
				)
			)
		),
		array(
			"label" => "UGC Item",
			"links" => array(
				array(
					"label" => "Search",
					"url" => "UGC_item/search.php"
				),
				array(
					"label" => "Moderate",
					"url" => "UGC_item/moderate.php"
				),
				array(
					"label" => "Create",
					"url" => "UGC_item/save.php"
				)
			)
		),
		array(
			"label" => "Searcher Keyword",
			"links" => array(
				array(
					"label" => "Search",
					"url" => "searcher_keyword/search.php"
				),
				array(
					"label" => "Create",
					"url" => "searcher_keyword/save.php"
				)
			)
		),
		array(
			"label" => "Searcher Result",
			"links" => array(
				array(
					"label" => "Search",
					"url" => "searcher_result/search.php"
				),
				array(
					"label" => "Create",
					"url" => "searcher_result/save.php"
				)
			)
		),
		array(
			"label" => "For developers",
			"links" => array(
				array(
					"label" => "Counter graphs",
					"url" => "counterGraph/index.php?id=^Client.set"
				)
			)
		)
	),
	
	"assetmanager" => array(
		"config" => '
{
	"ext":  {
		"urlPrefix": "' . $client_base_url . 'ext/",
		"serverRoot": "' . $client_root . 'ext/",
		"urlSuffix": ""
	}
}'
	),

	"path" => array(
		"xmleditor_data_include_file" => "example_data.php",
		"xmleditor_seo_include_file" => "example_seo.php"
	),
	
	"UGC_item" => array (
		"xmleditor_data_path" => "example",
		"save_root" => "' + $client_root + 'UGC/"
	),

	"search_result" => array(
		"xmleditor_data_include_file" => "p2_data.php"
	),
	
	"xmleditor_data" => array(
		"style_options" => array(
			array("label" => "Example", "include_file" => "example_style.php")
		)
	),
	
	"magicast" => array(
		"action_buttons" => array(
			array("label" => "Test / Flash Main", "url" => $client_base_url . "test_flash_main.php", "shortcut" => "alt+ctrl+m"),
			array("label" => "Test / Flash Popup", "url" => $client_base_url . "test_flash_popup.php", "shortcut" => "alt+ctrl+p"),
			array("label" => "Test / HTML5 Fullscreen", "url" => $client_base_url . "test_html5_fullscreen.php", "shortcut" => "alt+ctrl+f"),
			array("label" => "Test / HTML5 Stretch", "url" => $client_base_url ."test_html5_strech.php", "shortcut" => "alt+ctrl+s"),
			array("label" => "Export / HTML5", "url" => $client_base_url . "export_html5.php", "shortcut" => "alt+ctrl+e")
		)
	),
	
	"magicast/xmleditor_data" => array(
		"format_options" => array(
			array("label" => "Original", "value" => "original", "include_file" => "original/magicast.php"),
			array("label" => "Bofori", "value" => "bofori", "include_file" => "bofori/magicast.php"),
			array("label" => "New", "value" => "new", "include_file" => "new/magicast.php"),
			array("label" => "HTML5", "value" => "html5", "include_file" => "html5/magicast.php")
		)
	),

	"magicast/xmleditor_data/bofori" => array(
		"layer_options" => array(
			array("label" => "Generic", "include_file" => "layer_generic.php"),
			array("label" => "Magicaster", "include_file" => "layer_magicaster.php"),
			array("label" => "Game", "include_file" => "layer_game.php"),
			array("label" => "UGC", "include_file" => "layer_ugc.php"),
			array("label" => "P2", "include_file" => "layer_p2.php")
		),
		"node_action_options" => array(
			array("label" => "Magicaster", "include_file" => "node_action_magicaster.php"),
			array("label" => "Audio", "include_file" => "node_action_audio.php"),
			array("label" => "P2", "include_file" => "node_action_p2.php")
		),
		"layer_action_options" => array(
			array("label" => "Generic", "include_file" => "layer_action_generic.php"),
			array("label" => "Magicaster", "include_file" => "layer_action_magicaster.php"),
			array("label" => "Game", "include_file" => "layer_action_game.php"),
			array("label" => "UGC", "include_file" => "layer_action_ugc.php"),
			array("label" => "P2", "include_file" => "layer_action_p2.php")
		),
		"event_options" => array(
		)
	),

	"magicast/xmleditor_data/new" => array(
		"layer_options" => array(
			array("label" => "Generic", "include_file" => "layer_generic.php"),
			array("label" => "Magicaster", "include_file" => "layer_magicaster.php"),
			array("label" => "Game", "include_file" => "layer_game.php"),
			array("label" => "UGC", "include_file" => "layer_ugc.php"),
			array("label" => "P2", "include_file" => "layer_p2.php")
		),
		"magicast_action_options" => array(
			array("label" => "Magicaster", "include_file" => "magicast_action_magicaster.php"),
			array("label" => "Audio", "include_file" => "magicast_action_audio.php"),
			array("label" => "P2", "include_file" => "magicast_action_p2.php")
		),
		"layer_action_options" => array(
			array("label" => "Generic", "include_file" => "layer_action_generic.php"),
			array("label" => "Magicaster", "include_file" => "layer_action_magicaster.php"),
			array("label" => "Game", "include_file" => "layer_action_game.php"),
			array("label" => "UGC", "include_file" => "layer_action_ugc.php"),
			array("label" => "P2", "include_file" => "layer_action_p2.php")
		),
		"event_options" => array(
		)
	),

	"magicast/xmleditor_data/html5" => array(
		"layer_options" => array(
			array("label" => "Generic", "include_file" => "layer_generic.php"),
			array("label" => "Service", "include_file" => "layer_service.php"),
			array("label" => "Magicaster", "include_file" => "layer_magicaster.php")
		),
		"action_options" => array(
			array("label" => "Magicast", "include_file" => "action_magicast.php"),
			array("label" => "Magicaster", "include_file" => "action_magicaster.php"),
			array("label" => "Generic", "include_file" => "action_generic.php"),
			array("label" => "Service", "include_file" => "action_service.php")
		),
		"event_options" => array(
		)
	)

));

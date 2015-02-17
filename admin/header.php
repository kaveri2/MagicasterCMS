<?
	header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>css/codemirror.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>css/codemirror/eclipse.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>css/jquery-ui/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>css/jquery.ui.timepicker.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>assetmanager/assetmanager.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>accessmanager/accessmanager.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>objectmanager/objectmanager.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>xmleditor/xmleditor.css" type="text/css" media="screen" />	
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>css/style.css" type="text/css" media="screen" />				
		<!--[if lt IE 10]> <link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>css/ie.css" type="text/css" /> <![endif]-->
		<link rel="stylesheet" href="<?= $CONFIG["base_url"] ?>css/firefox.css" type="text/css" />		
		<link rel="shortcut icon" href="<?= $CONFIG["base_url"] ?>favicon.ico" />
		<script type="text/javascript">
			if( window.console === undefined ) {
				if( window.opera !== undefined ) {
					window.console = {
						log: window.opera.postError,
						debug: window.opera.postError,
						warn: window.opera.postError,
						error: window.opera.postError
					};
				} else {
					window.console = {
						log: function() {},
						debug: function() {},
						warn: function() {},
						error: function() {}
					};
				}
			}
		</script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/codemirror/codemirror.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/codemirror/xml.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/codemirror/util/formatting.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/jquery-1.9.1.js"></script >
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/jquery-ui-1.9.2.custom.min.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/jquery.xmldom-1.0.min.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/jquery.timer.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/jquery.swfobject.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/jquery.hotkeys.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/swfobject.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/flowplayer-3.1.4.min.js"></script>	
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>js/general.js"></script>	
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>accessmanager/jquery.accessmanager.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>assetmanager/jquery.assetmanager.js"></script>
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>objectmanager/jquery.objectmanager.js"></script>	
		<script type="text/javascript" src="<?= $CONFIG["base_url"] ?>xmleditor/jquery.xmleditor.js"></script>
		<script>
			$.assetmanager.baseUrl = "<?= $CONFIG["base_url"] ?>assetmanager/";
			$.assetmanager.config = <?= $CONFIG['assetmanager']['config'] ?>;
			$.accessmanager.baseUrl = "<?= $CONFIG["base_url"] ?>accessmanager/";
			$.accessmanager.editUrl = "<?= $CONFIG["base_url"] ?>access/save.php";
			$.objectmanager.baseUrl = "<?= $CONFIG["base_url"] ?>objectmanager/";
			$.objectmanager.editUrls['Magicast'] = "<?= $CONFIG["base_url"] ?>magicast/save.php";
			$.objectmanager.editUrls['UGC_Context'] = "<?= $CONFIG["base_url"] ?>UGC_context/save.php";
		</script>
		<title>Magicaster<?= isset($HTML_title) ? " / " . $HTML_title : "" ?></title>
	</head>

	<body>
	
	<div id="navigation">
		
			<div id="logo"><a href="<?= $CONFIG["base_url"] ?>">Magicaster</a></div>
			
			<ul id="menu">
<?
				foreach ($CONFIG['menu'] as $menu) {
?>
					<li><h4><?= $menu['label'] ?></h4></li>
					<li>
						<ul class="menu-items">
<?
						foreach ($menu['links'] as $link) {
?>
							<li><a href="<?= $CONFIG["base_url"] . $link['url'] ?>"><?= $link['label'] ?></a></li>
<?
						}
?>
						</ul>
					</li>
<?
				}
?>
			</ul>
	</div><!-- END navigation -->

<?
	if (!strpos($_SERVER['HTTP_USER_AGENT'], "Chrome") && !strpos($_SERVER['HTTP_USER_AGENT'], "Firefox")) {
?>
		<div class="browser-incombatible"><p>Magicaster CMS has only been proven to work with <a href="http://www.google.com/chrome/" title="Get Google Chrome!">Chrome</a> and <a href="http://www.mozilla.org/firefox/" title="Get Mozilla Firefox!">Firefox</a>!</p></div>
<?
	}
?>
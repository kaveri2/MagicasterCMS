<?php
header("Content-Disposition: attachment; filename=embed.html");
header("Content-Type: application/download");
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, user-scalable=no"/>
	<script type="text/javascript" src="../kickstart-1.js"></script>
</head>

<body style="margin: 0px; padding: 0px; background-color: #ffffff;">
<? 
	if ($_REQUEST['data']) { 
?>
	<div style="position: absolute; width: 100%; height: 100%;" data-magicaster-magicast-xml>
		<textarea style="display: none;"><data><?= $_REQUEST['data'] ?></data></textarea>
	</div>
<? 
	} 
?>
</body>
</html>
<?php
$s = ob_get_contents();
//$s = gzcompress($s, 9);
ob_end_clean();
echo $s;
?>
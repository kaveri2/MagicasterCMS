<?php
header("Content-Disposition: attachment; filename=magicast_export.html");
header("Content-Type: application/download");
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, user-scalable=no"/>
	<script type="text/javascript" src="/2015/kickstart-5.js"></script>
</head>

<body style="margin: 0px; padding: 0px; background-color: #000000;">
	<div style="position: absolute; width: 100%; height: 100%; background-image: url('http://tubequiz.s3.amazonaws.com/2015/loading.gif'); background-repeat: no-repeat; background-position: 50% 50%;">
	</div>
<? 
	if ($_REQUEST['data']) { 
?>
	<div style="position: absolute; width: 100%; height: 100%;" data-magicaster-magicast-xml>
		<textarea style="display: none;"><id><?= (0 + $_REQUEST['id']) ?></id><data><?= $_REQUEST['data'] ?></data></textarea>
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
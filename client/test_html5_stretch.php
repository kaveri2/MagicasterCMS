<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Magicaster / Test HTML5 Magicast</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, user-scalable=no"/>
	<script type="text/javascript" src="js/kickstart-dev.js?v=1"></script>
</head>

<body style="margin: 0px; padding: 0px; background-color: #000000;">
	<div style="position: absolute; width: 100%; height: 100%; background-image: url('http://tubequiz.s3.amazonaws.com/2015/loading.gif'); background-repeat: no-repeat; background-position: 50% 50%;">
	</div>
<?php 
	if ($_REQUEST['data']) { 
?>
	<div style="margin: 10px; width: 500px; border: 1px solid red" data-magicaster-magicast-xml>
		<textarea style="display: none;"><id><?php echo $_REQUEST['id'] ?></id><data><?php echo $_REQUEST['data'] ?></data></textarea>
	</div>
<?php 
	} else if ($_REQUEST['id']) { 
?>
	<div style="margin: 10px; width: 500px; border: 1px solid red" data-magicaster-magicast-id="<?php echo $_REQUEST['id'] ?>">
	</div>
<?php
	}
?>
</body>
</html>

<?php
	require_once("../core.php");
	$mId = isset($_REQUEST["id"]) ? 0 + $_REQUEST["id"] : 0;
	$magicast = new Magicast(isset($_REQUEST["id"]) ? 0 + $_REQUEST["id"] : 0);
	if ($magicast->id) { 
		$magicast->load(); 
	}
	
	if (isset($_REQUEST["save"]))
	{	
		$magicast->adminName = $_REQUEST["adminName"];
		$magicast->data = $_REQUEST["data"];
		$magicast->public = 0 + $_REQUEST["public"];
		$magicast->save();
		
		$magicastBackup = new MagicastBackup();
		$magicastBackup->magicast = $magicast;
		$magicastBackup->adminName = $magicast->adminName;
		$magicastBackup->data = $magicast->data;
		$magicastBackup->public = 0 + $_REQUEST["public"];
		$magicastBackup->save();
		
		header("Location: save.php?id=" . $magicast->id);  
	}
	
	$HTML_title = "Magicast / " . $magicast->id . ": " . $magicast->adminName;
	include("../header.php");
?>

<div id="content-head">
	<div id="content-head-left">
		<h1><?= $magicast->id ? "Edit" : "New" ?> magicast</h1>
	</div>
	<div id="content-head-right">
<?	
	if ($magicast->id) {
		echo '<input class="big-button" type="button" id="backupButton" value="Load a backup" title="Load an older version of this Magicast"/>';
	}
?>
	</div>
	<div id="content-head-footer"></div>
</div>

<div id="templates">
	<h3>Step 1: Select template</h3>
	<p>
<?
	$magicasts = DB::search(
		array(
			"class" => "Magicast", 
			"order_by" => "adminName, id", 
			"where" => "adminName LIKE 'TEMPLATE%'"
	));
	foreach ($magicasts as $tmpMagicast) {
?>
	<a href="#" class="templateButton" magicastId="<?= $tmpMagicast->id ?>"><?= substr($tmpMagicast->adminName, 10) ?></a>
<?
	}
?>
	</p>
	<h3>Step 2: Fill in language data</h3>
	<p>
	<textarea id="templateLanguage" style="height: 400px"></textarea>
	</p>
	<h3>Step 3: Generate</h3>
	<p>
	<a href="#" id="templateConfirmation">Confirm</a>
	</p>
</div>

<div id="content">

<form id="form" method="post">

	<p>
		<label for="adminName" class="top-label">Admin name</label>
		<input class="text" type="text" name="adminName" id="adminName" value="<?= $magicast->adminName; ?>" />
	</p>

	<p>
		<label for="adminName" class="top-label">Public?</label>
		<input class="text" type="text" name="public" id="public" value="<?= $magicast->public; ?>" />
	</p>
	
	<p>
		<div id="data"><textarea><?= $magicast->data; ?></textarea></div>
	</p>

	<input type="hidden" name="id" value="<?= $magicast->id; ?>" />
	<input type="hidden" name="save" value="true" />
		
	<p>
		<input class="big-button" type="submit" id="save" value="Save" title="ctrl+s" />
	</p>
	<p>
<?
		foreach ($CONFIG['magicast']['action_buttons'] as $index => $b) {
?>	
			<input class="big-button" type="button" id="actionButton_<?= $index ?>" value="<?= $b['label'] ?>" title="<?= $b['shortcut'] ?>" />
<?
		}
?>
	</p>
</form>

<script type="text/javascript">		
	var buttonPressed = false;
	$(function() {
		var templateData = "";
		$(".templateButton").click(function() {
			$(".templateButton").removeClass('selected');
			$(this).addClass('selected');
			$.get('getMagicastData.php?id=' + $(this).attr('magicastId'), function(data) {
				templateData = data;
				var elements = templateData.match(/\{([A-ZÅÄÖa-zåäö0-9-_]+)\}/g);
				var lines = "";
				if (elements) {
					for (var i=0 ; i<elements.length ; i++) {
						var element = elements[i];
						element = element.replace("{", "").replace("}", "");
						lines = lines + element + "=" + "\n";
					}
				}
				$('#templateLanguage').val(lines);
			});
			return false;
		});
		$("#templateConfirmation").click(function() {
			var data = templateData;
			var lines = $('#templateLanguage').val().split('\n');			
			if (lines) {
				for (var i=0 ; i<lines.length ; i++) {
					var a = lines[i].split('=');
					data = data.replace(new RegExp("{" + a.shift() + "}", "g"), a.join('='));
				}
			}
			$("#data").xmleditor("val", data);
			$("#data").xmleditor("tab", 0);
			return false;
		});
		$("#data").xmleditor('load', 'xmleditor_data/magicast.php'); 		
		$("#data").xmleditor('templates').append($('#templates')); 		
		$("#save").click(function() {
			buttonPressed = true;
			$("#form").append("<textarea name=\"data\">" + $("#data").xmleditor("val") + "</textarea>");
			return true;
		});
<?
		foreach ($CONFIG['magicast']['action_buttons'] as $index => $b) {
?>	

		$("#actionButton_<?= $index ?>").click(function() {
			var xml = $("#data").xmleditor("val");					
			$("body").append("<form id='form_action' method='post' action='<?= $b['url'] ?>' target='_blank' style='display: none;'><textarea name='data'>" + xml + "</textarea><input type='text' name='id' value='<?= $magicast->id ?>' /></form>");
			$("#form_action").submit();
			$("#form_action").remove();
			return false;
		});

		$(document).bind('keydown', '<?= $b["shortcut"] ?>', function() {
			$('input#actionButton_<?= $index ?>').trigger('click');
			return false;
		});
<?
		}
?>
		$('input#adminName').focus();

		// Keyboard shortcuts
		$(document).bind('keydown', 'ctrl+s', function() {
			$('input#save').trigger('click');
			return false;
		});

		var dialog = $('<div class="magicastBackup_dialog"></div>');
		$('#backupButton').click(function(evt){
	
			dialog.dialog(
			{
				modal: true,
				autoOpen: true,
				closeOnEscape: true,
				title: 'Backups for selected Magicast',
				width: 640,
				minHeight: 300,
				maxHeight: 500,
				position: {my: "center top", at: "center top+20", of: window},
				close: function()
				{
					dialog.remove();
				}
			});
			
			$.get('backup_search.php?magicastId=<?= $mId ?>', function(data){
				dialog.empty();
				dialog.append(data);
			}); 
		});

		$(document).on("click", "a.magicastSelect", function(evt) {
			$.get('getBackupMagicastData.php?id=' + $(this).attr('magicastId'), function(data) {
				$("#data").xmleditor("val", data);
				$("#data").xmleditor("tab", 0);			
			});
			dialog.dialog("close");
			return false;
		});

		$(document).on("click", ".magicastBackup_dialog a.link_pager", function(evt){
			var page = $(this).attr('page');
			$.get('backup_search.php?magicastId=<?= $mId ?>&page='+page, function(data){
				dialog.empty();
				dialog.append(data);
			}); 
			return false;
		});

		// Confirmation on page close
		function closeWarning() {
			if (!buttonPressed)
			return "Did you save your work? ^__^";
		}
		window.onbeforeunload = closeWarning;

	});
	</script>

<?
	include("../footer.php"); 
?>

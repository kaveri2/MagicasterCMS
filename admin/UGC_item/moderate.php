<?php
	include("../core.php");
	
	$skip = isset($_REQUEST['skip']) ? $_REQUEST['skip'] : 0;

	$UGC_context = new UGC_Context(isset($_REQUEST['UGC_contextId']) ? $_REQUEST['UGC_contextId'] : 0);
	$UGC_context->load();

	$HTML_title = "UGC Item / moderate / " . $UGC_context->name;
	
	include("../header.php");

	if (isset($_POST['save'])) {
		$UGC_sentItem = new UGC_SentItem(0 + $_POST['UGC_sentItemid']);
		$UGC_sentItem->load();

		$xml = new SimpleXMLElement("<data>" . $UGC_sentItem->data . "</data>");
		$image = base64_decode($xml->image);
		$im = imagecreatefromstring($image);
		imagejpeg($im, $CONFIG['UGC_item']['save_root'] . $UGC_sentItem->hash . ".jpg");

		$w = imagesx($im);
		$h = imagesy($im);
		$scale = max(100 / $w, 100 / $h);
		
		$im_i = imagecreatetruecolor($w * $scale, $h * $scale);
		imagecopyresampled($im_i, $im, 0, 0, 0, 0, $w * $scale, $h * $scale, $w, $h);
		imagejpeg($im_i, $CONFIG['UGC_item']['save_root'] . $UGC_sentItem->hash . "_icon.jpg");

		$UGC_item = new UGC_Item();
		$UGC_item->UGC_context = new UGC_Context(0 + $_POST["UGC_contextId"]);
		$UGC_item->UGC_itemType = new UGC_ItemType(0 + $_POST["UGC_itemTypeId"]);
		$UGC_item->UGC_sentItem = $UGC_sentItem;
		$UGC_item->data = "" . $_POST["data"];
		if ("" . $_POST["published"] != "") {
			$UGC_item->published = $_POST["published"];
		} else {
			$UGC_item->published = date('Y-m-d H:i:s');
		}
		if ("" . $_POST["created"] != "") {
			$UGC_item->created = $_POST["created"];
		} else {
			$UGC_item->created = "0000-00-00 00:00:00";
		}
		$UGC_item->save();
		
		$UGC_sentItem->moderated = date('Y-m-d H:i:s');
		$UGC_sentItem->UGC_item = $UGC_item;
		$UGC_sentItem->save();
		
		$to      = $xml->email;
		$subject = "Kuvasi on julkaistu Pikku Kakkosen netissä ja sovelluksessa";
		$message = "Hei,\r\n\r\nlähettämäsi kuva on julkaistu Pikku Kakkosen netissä ja sovelluksessa: http://yle.fi/pikkukakkonen/\r\n\r\nMikäli et ole tyytyväinen julkaisuun, pääset tämän linkin kautta sivulle, jolla voit poistaa kuvan: http://yle.fi/pikkukakkonen/poista-kuva/?hash=" . $UGC_sentItem->hash . "&check=" . md5("kerttu" . $UGC_sentItem->id) . "\r\n\r\nTerveisin,\r\nPikku Kakkonen"; 
		$headers = "From: Pikku Kakkonen <pikkukakkonen@yle.fi>" . "\r\n";
		$headers .= "Content-type: text/plain; charset=utf-8" . "\r\n";
		mail($to, $subject, $message, $headers);
		
	}
	
	if (isset($_POST['delete'])) {
		$UGC_sentItem = new UGC_SentItem(0 + $_POST['UGC_sentItemid']);
		$UGC_sentItem->load();
		$UGC_sentItem->moderated = date('Y-m-d H:i:s');
		$UGC_sentItem->save();
	}
	
	if ($UGC_context->id) {

		$items = DB::search(
			array(
				"class" => "UGC_SentItem", 
				"page" => 0, 
				"per_page" => 1, 
				"order_by" => "id ASC", 
				"where" => "UGC_contextId=" . $UGC_context->id . " AND moderated=0 AND id>" . $skip
		));
		
		if (count($items)) {
			$UGC_sentItem = $items[0];
			$xml = new SimpleXMLElement("<data>" . $UGC_sentItem->data . "</data>");
			if ($UGC_sentItem->UGC_sentItemType->id==1) {
				$itemTypeId = 1;
				$data = "<iconImageAsset><type>UGC</type><value>" . $UGC_sentItem->hash . "_icon.jpg</value></iconImageAsset><imageAsset><type>UGC</type><value>" . $UGC_sentItem->hash . ".jpg</value></imageAsset><creator><name>" . $xml->name . "</name><age>" . $xml->age . "</age><city>" . $xml->city . "</city></creator><description>" . $xml->title . "</description>";
			}
		}
		
		$count1 = DB::count(
			array(
				"class" => "UGC_SentItem", 
				"where" => "UGC_contextId=" . $UGC_context->id . " AND moderated=0 AND id<=" . $skip
		));			

		$count2 = DB::count(
			array(
				"class" => "UGC_SentItem", 
				"where" => "UGC_contextId=" . $UGC_context->id . " AND moderated=0 AND id>" . $skip
		));			
	}		
?>

<div id="content-head">
		
	<div id="content-head-left">
		Search by UGC Context
	</div>
	
	<div id="content-head-right">
		<form id="search" method="get">
			<div id="UGC_context"><?php echo $UGC_context->id ?></div>
			<input type="submit" id="searchSubmit" class="big-button" value="Search" />
		</form>
	</div>
	
	<div id="content-head-footer"></div>

	<script type="text/javascript">
	$(function() {
		$('#search #UGC_context').objectmanager("create", "UGC_Context");
		$("#searchSubmit").click(function() {
			$("#search").append("<input type=\"hidden\" name=\"UGC_contextId\" value=\"" + $("#search #UGC_context").objectmanager("val") + "\" />");
		});
	});
	</script>
			
</div>

<div id="content">

<?php
	if ($UGC_context->id) {
?>

	<form id="skip-form" method="get">
		<input type="hidden" id="UGC_contextId" name="UGC_contextId" value="<?php echo $UGC_context->id ?>" />
		<input type="hidden" id="skip" name="skip" value="<?php echo isset($UGC_sentItem) ? $UGC_sentItem->id : $skip ?>" />
		<p>
			<label class="top-label">Total: <?php echo $count1 + $count2 ?> / Skipped: <?php echo $count1 ?></label>
			<input id="skip-button" type="submit" class="big-button" value="Skip this" />
			<input id="reset-button" type="submit" class="big-button" value="Reset" />
		</p>
	</form>

	<script type="text/javascript">
	$(function() {
		$("#skip-form #reset-button").click(function() {
			$("#skip-form #skip").val("0");
		});
	});
	</script>	
	
	<hr />

<?php
	} else {
?>
	<h3>
		Select UGC Context!
	</h3>
<?php
	} 
?>

<?php
	if (isset($UGC_sentItem)) {	
?>
		
	<form id="form" method="post">	
		<p>
			<label class="top-label">Image</label>
			<img src="img.php?id=<?php echo $UGC_sentItem->id ?>" width="500" />
			<label class="top-label">UGC Context</label>
			<div id="UGC_context"><?php echo $UGC_sentItem->UGC_context->id ?></div>
			<label class="top-label">UGC Item Type</label>
			<div id="UGC_itemType"><?php echo $itemTypeId ?></div>
			<label class="top-label">Data</label>
			<div id="xmleditor_data"><textarea><?php echo $data ?></textarea></div>
			<label class="top-label">Created</label>
			<input type="text" name="created" class="datetimepicker" value="<?php echo $UGC_sentItem->created ?>" />
			<label class="top-label">Published</label>
			<input type="text" name="published" class="datetimepicker" value="" />
		</p>
		
		<p>
<?php
	if ("" . $xml->approval != "true") {
?>
			Kuvan lähettäjä ei ole antanut lupaa kuvan julkaisemiseen. Kuvan voi poimia sisäisesti talteen, inspiraation lähteenä käytettäväksi.
<?php
	} else {
?>
			Kuvan lähettäjä on antanut luvan kuvan julkaisemiseen. Sähköposti julkaisusta lähetetään osoitteeseen: <?php echo $xml->email ?>
<?php
	}
?>
		</p>
		<p>
			<input type="hidden" name="UGC_sentItemid" value="<?php echo $UGC_sentItem->id ?>" />
<?php
	if ("" . $xml->approval == "true") {
?>
			<input id="save" name="save" type="submit" class="big-button" value="Save" />
<?php
	}
?>
			<input id="delete" name="delete" type="submit" class="big-button" value="Delete" />
		</p>
	</form>	
			
	<script type="text/javascript">
	$(function() {
		$('#form #UGC_context').objectmanager("create", "UGC_Context");
		$('#UGC_itemType').objectmanager("create", "UGC_itemType");		
		$("#UGC_itemType").objectmanager("change", function() {
			var val = $("#xmleditor_data").xmleditor("val");
			$("#xmleditor_data").xmleditor('load', 'xmleditor_data/<?php echo $CONFIG['UGC_item']['xmleditor_data_path'] ?>/' + $("#UGC_itemType").objectmanager("val") + '.php'); 
			$("#xmleditor_data").xmleditor("val", val);
		});
		$("#xmleditor_data").xmleditor('load', 'xmleditor_data/<?php echo $CONFIG['UGC_item']['xmleditor_data_path'] ?>/' + $("#UGC_itemType").objectmanager("val") + '.php');
		$("#save").click(function() {
			if (window.confirm("SAVE? Are you sure?")) {
				$("#form").append("<input type=\"hidden\" name=\"UGC_contextId\" value=\"" + $("#form #UGC_context").objectmanager("val") + "\" />");
				$("#form").append("<input type=\"hidden\" name=\"UGC_itemTypeId\" value=\"" + $("#UGC_itemType").objectmanager("val") + "\" />");
				$("#form").append("<textarea name=\"data\">" + $("#xmleditor_data").xmleditor("val") + "</textarea>");
				$("#xmleditor_data").empty();
				return true;
			} else {
				return false;
			}
		});
		$("#delete").click(function() {
			return window.confirm("DELETE? Are you sure?");
		});
		$('.datetimepicker').datetimepicker({
			showSecond: true,
			dateFormat: 'yy-mm-dd',
			timeFormat: 'hh:mm:ss'
		});
	});
	</script>	
<?php
	}
?>
</div>
<?php
	include("../footer.php");
?>
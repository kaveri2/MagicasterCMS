<?php
	require_once("../core.php");

	$id = $_REQUEST["id"];	
	
	$clients = DB::search(
		array(
			"class" => "Client", 
			"order_by" => "name, id"
	));
	
	if (isset($_REQUEST["clientIds"])) {
		$clientIds = $_REQUEST["clientIds"];
	} else {
		$clientIds = array();
		foreach ($clients as $client) {
			$clientIds[] = $client->id;
		}
	}
	
	$clientIds_GET = "";
	foreach ($clientIds as $clientId) {
		$clientIds_GET = $clientIds_GET . "&clientIds[]=" . (0 + $clientId);
	}
		
	$start = isset($_GET['start']) ? strtotime($_GET['start']) : '';
	$start_formatted = $start ? date('Y-m-d H:i:s', $start) : '';

	$end = isset($_GET['end']) ? strtotime($_GET['end']) : '';
	$end_formatted = $end ? date('Y-m-d H:i:s', $end) : '';
	$interval = isset($_GET['interval']) ? $_GET['interval'] : '';
	
	$HTML_title = "Counter / " . $id;
	include("../header.php");
?>

<div id="content-head">
		
			<div id="content-head-left">
				<h1><?= $id ?></h1>
			</div>
			
			<div id="content-head-right"></div>
			
			<div id="content-head-footer"></div>

</div>

<div id="content">

		<div id="my_chart"></div>
		<fieldset id="chart_actions">
			<legend>Actions</legend>
			<form>
				<p>
					<label>Counter(s): </label>
					<input type="text" name="id" value="<?= $id; ?>" />
				</p>
				<p>
					<label>Client(s):</label>
					<div>
<?
foreach ($clients as $client) {
	$checked = false;
	foreach ($clientIds as $clientId) {
		if ($clientId==$client->id) {
			$checked = true;
		}
	}
?>
						<input type="checkbox" name="clientIds[]" value="<?= $client->id ?>"<?= $checked ? " checked" : "" ?>> <?= $client->name ?><br />
<?
}
?>
					</div>
				</p>
				<p>
					<label>Start:</label>
					<input type="text" name="start" class="dateTime" value = "<?= $start_formatted ?>" />
				</p>
				<p>
					<label>End:</label>
					<input type="text" name="end" class="dateTime" value = "<?= $end_formatted ?>" />
				</p>
				<p>
					<label>Interval (seconds):</label>
					<input type="text" name="interval" value = "<?= $interval ?>" />
				</p>
				<p>
					<input type="submit" class="big-button" />
				</p>
			</form>
		</fieldset>

<script type="text/javascript">
$(function() {
	$('.dateTime').datepicker({
		dateFormat: 'yy-mm-dd',
		duration: '',
		showTime: true,
		constrainInput: false		
	});
	
	swfobject.embedSWF("../open-flash-chart.swf", "my_chart", "940", "760", "9.0.0", "expressInstall.swf", {
		"data-file": "<?= urlencode("ajax_counterGraph.php?id=" . urlencode($id) . "&$clientIds_GET&start=$start&end=$end&interval=$interval") ?>"
	});
});
</script>

<?
include("../footer.php");
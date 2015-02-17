<?
	require_once("../core.php");

	$HTML_title = "Frontpage";
	include("../header.php");
?>
<div id="content-head">
		
	<div id="content-head-left">
		<h1>Frontpage</h1>
	</div>
	
	<div id="content-head-right">

	</div>
	
	<div id="content-head-footer"></div>
	
</div>

<div id="content">
	<div id="frontpage-stats">
		<h2>Recent sessions</h2>
		<div id="graph"></div>
		<div id="session_count" class="stats-block"></div>
		<div id="session_paths" class="stats-block"></div>
		<div id="session_durations" class="stats-block"></div>
		<div id="session_cities" class="stats-block"></div>
	</div>

	<script>
	$(function() {
		function loadSessionCount() {
			$.ajax({
				url: 'ajax_session_count.php?time=<?= time() ?>',
				success: function(data) {
					$("#session_count").html(data);
				}
			});
		}
		function loadSessionDetails() {
			$.ajax({
				url: 'ajax_session_durations.php?time=<?= time() ?>',
				success: function(data) {
					$("#session_durations").html(data);
				}
			});
			$.ajax({
				url: 'ajax_session_paths.php?time=<?= time() ?>',
				success: function(data) {
					$("#session_paths").html(data);
				}
			});
			$.ajax({
				url: 'ajax_session_cities.php?time=<?= time() ?>',
				success: function(data) {
					$("#session_cities").html(data);
				}
			});
		}	
		function loadSessionCountGraph() 
		{	
			console.log(swfobject);
			swfobject.embedSWF(
				"../open-flash-chart.swf", "graph", "100%", "350",
				"9.0.0", "expressInstall.swf",
				{
					"data-file": "ajax_session_count_graph.php?time=<?= time() ?>"
				}
			)
		}
			
		$.timer(5000, function (timer) {
			loadSessionCount();
		});
		loadSessionCount();
		$.timer(30000, function (timer) {
			loadSessionDetails();
		});
		loadSessionDetails();
		$.timer(60000, function (timer) {
			loadSessionCountGraph();
		});
		loadSessionCountGraph();
	});
	</script>

<?php 
	include("../footer.php"); 

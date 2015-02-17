<?
	if ($CONFIG['debug'] && DB::$debugOutput) {
?>
	<div class="debug-text"><pre><?= htmlentities(DB::$debugOutput) ?></pre></div>
<?
	}
?>
		</div>
	</body>
</html>
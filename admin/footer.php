<?php
	if ($CONFIG['debug'] && DB::$debugOutput) {
?>
	<div class="debug-text"><pre><?php echo htmlentities(DB::$debugOutput) ?></pre></div>
<?php
	}
?>
		</div>
	</body>
</html>
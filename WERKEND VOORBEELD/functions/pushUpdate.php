<?php
	function pushUpdate() {
		global $backendDB;
		$updatePushed = $backendDB->query("INSERT INTO `updates` (`id`, `time`) VALUES (NULL, CURRENT_TIMESTAMP);", true);
	}
?>
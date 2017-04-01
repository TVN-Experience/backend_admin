<?php
	if (!isset($_SESSION["userID"]) || $_SESSION["userID"] < 1) {
		$redirectedFrom = basename($_SERVER['PHP_SELF']);
		header("location: login?redirectedFrom=" . $redirectedFrom);
		die();
	}
?> 
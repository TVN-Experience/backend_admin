<?php	
	require 'config.php';

	// Logout by destroying the user session
	session_destroy();
	
	// Redirect to login page
	header("location: login");
	die();
?> 
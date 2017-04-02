<?php
	//Start a session to catch if user is logged in
	session_start();

	//Database configuration
	define("DB_SERVER", "localhost");
	define("DB_NAME", "0892756");
	define("DB_USERNAME", "0892756");
	define("DB_PASSWORD", "n4key1a1");
	define("TABLE_PREFIX", "TVN_");

	require "db.php";
	$backendDB = new backendDB();

	//Set variables that are used on all pages
	define("BASE_URL", "");

	//Require all files that needs to be included on all pages
	require "includes/menu-items.php";
	require "functions/pushUpdate.php";
	require "functions/message.php";
?>
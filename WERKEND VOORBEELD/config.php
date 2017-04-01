<?php
	//Start a session to catch if user is logged in
	session_start();

	//Database configuration
	define("DB_SERVER", "localhost");
	define("DB_NAME", "fithappens");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");

	require "db.php";
	$backendDB = new backendDB();

	//Set variables that are used on all pages
	define("BASE_URL", "");

	//Require all files that needs to be included on all pages
	require "includes/menu-items.php";
	require "functions/pushUpdate.php";
	require "functions/message.php";
?>
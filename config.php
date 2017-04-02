<?php
	//Start a session to catch if user is logged in
	session_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//Database configuration
	define("DB_SERVER", "localhost");
	define("DB_NAME", "prj_2016_2017_bcp_mt3b_t2");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("TABLE_PREFIX", "tvn_");

	require "db.php";
	$backendDB = new backendDB();

	require "api.php";
	$apiConnection = new apiConnection();

	//Set variables that are used on all pages
	define("BASE_URL", "");
	define("BASE_API_URL", "https://project.cmi.hr.nl/2016_2017/bcp_mt3b_t2/api/");

	//Require all files that needs to be included on all pages
	require "includes/menu-items.php";
	require "functions/pushUpdate.php";
	require "functions/message.php";
?>
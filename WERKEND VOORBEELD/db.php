<?php
	/**
	* 
	*/
	class backendDB
	{
		
		private $conn;

		function __construct() {
			$this->conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
			// Check connection
			if ($this->conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
		}

		function query($sql, $returnId = false) {
			$result = $this->conn->query($sql);
			if ($returnId) {
				return $this->conn->insert_id;
			} else {
				if($result) {
					return $result;
				} else {
					return mysqli_error($this->conn);
				}
			}
		}

		function escapeString($string) {
			return mysqli_real_escape_string($this->conn, $string);
		}
	}
?>
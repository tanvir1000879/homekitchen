<?php
	function connect(){
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$dbName = 'homekitchen';
		
		$con = new mysqli($host,$user,$pass,$dbName);
		return $con;
	}
?>
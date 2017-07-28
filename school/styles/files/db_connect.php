<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
		$dbhandler = new PDO("mysql:host=$servername;dbname=student_db", $username, $password);
		// set the PDO error mode to exception
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		$msg = '  Error in database connection  ';
	}
?>
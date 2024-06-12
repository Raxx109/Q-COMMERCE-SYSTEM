<?php
$host		= 'localhost';
$db			= 'angsarapq';
$user		= 'root';
$password	= '';


	try {
		$conn = "mysql:host=$host;dbname=$db;charset=UTF8";
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		// echo "Connected";
		return new PDO($conn, $user, $password, $options);
		
	} catch (PDOException $e) {
		die($e->getMessage());
	}


return connect($host,$db,$user,$password);
?>
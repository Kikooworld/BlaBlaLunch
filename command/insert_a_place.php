<?php
	header('content-type: text/html; charset=utf-8');
	include("database_connection.php");
	
	function InsertAPlace($name, $address)
	{
		//Connect to database
		$db = ConnectToDataBase();
		
		//preparer la requete
		$req_pre = mysqli_prepare($db, "INSERT INTO `restaurants` (`name`, `address`) VALUES (\"" . $name . "\", \"" . $address . "\");") or die(mysqli_error($db));
		
		//executer la requete
		mysqli_stmt_execute($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
		
		header('Location: ../suggest_a_blablalunch.php');
	}
?>
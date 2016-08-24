<?php
	include("database_connection.php");
	
	function InsertAPlace($name, $address)
	{
		//Connect to database
		$db = ConnectToDataBase();
		
		//preparer la requete
		$req_pre = mysqli_prepare($db, "INSERT INTO `restaurants` (`name`, `address`) VALUES (\"" . $name . "\", \"" . $address . "\");") or die(mysqli_error($db));
		mysqli_set_charset( $db, 'utf8' );
		
		//executer la requete
		mysqli_stmt_execute($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
		
		header('Location: ../suggest_a_blablalunch.php');
	}
?>
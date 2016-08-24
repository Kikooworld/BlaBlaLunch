<?php
	header('content-type: text/html; charset=utf-8');
	include("database_connection.php");
	
	function InsertACar($name, $restaurant_id, $seats, $time, $take_away)
	{		
		//Connect to database
		$db = ConnectToDataBase();
		
		//preparer la requete
		$req_pre = mysqli_prepare($db, "INSERT INTO `cars` (`owner`, `time`, `seats`, `id`, `restaurant_id`, `take_away`) VALUES (\"" . $name . "\", \"" . $time . "\", \"" . $seats . "\", NULL, \"" . $restaurant_id . "\", \"" . $take_away . "\");") or die(mysqli_error($db));
			
		//executer la requete
		mysqli_stmt_execute($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
		
		header('Location: ../index.php');
	}
?>
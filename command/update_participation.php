<?php
	header('content-type: text/html; charset=utf-8');
	include("database_connection.php");
	
	$participation = (int)$_GET['participation'];
	$participant = (int)$_GET['participant'];
	$car = (int)$_GET['car'];
		
	//Connect to database
	$db = ConnectToDataBase();
	
    // mysqli_query($db, "LOCK TABLES participations WRITE;");
		
	//Update cars table
	$req_pre = mysqli_prepare($db, "UPDATE participations SET participant_id = \"".$participant."\", car_id = \"".$car."\" WHERE id = \"".$participation."\";") or die(mysqli_error($db));
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_close($req_pre);
	
    //Unlock table
    // mysqli_query($db, "UNLOCK TABLES;");
    
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	header('Location: ../index.php');
?>
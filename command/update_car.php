<?php
	header('content-type: text/html; charset=utf-8');
	include("database_connection.php");
	
	$id = $_GET['id'];
	$restaurant_id = (int)$_GET['restaurant'];
	$seats = (int)$_GET['seats'];
	$time = $_GET['time'];
	$take_away = (bool)$_GET['time'];
		
	//Connect to database
	$db = ConnectToDataBase();
	
	//Update cars table
	$req_pre = mysqli_prepare($db, "UPDATE cars SET restaurant_id = \"".$restaurant_id."\", seats = \"".$seats."\", take_away = \"".$take_away."\", time = \"".$time."\" WHERE id = \"".$id."\";") or die(mysqli_error($db));
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_close($req_pre);
	
	//Update participations table
	$req_pre = mysqli_prepare($db, "DELETE FROM participations WHERE car_id = \"".$id."\";") or die(mysqli_error($db));
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_close($req_pre);
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	header('Location: ../index.php');
?>
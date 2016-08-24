<?php
	include("database_connection.php");
	
	$id = $_GET['id'];
	$address = $_GET['address'];
		
	//Connect to database
	$db = ConnectToDataBase();
	
	$req_pre = mysqli_prepare($db, "UPDATE restaurants SET address = \"".$address."\" WHERE id = \"".$id."\";") or die(mysqli_error($db));
	mysqli_set_charset( $db, 'utf8' );
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_close($req_pre);
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	header('Location: ../suggest_a_blablalunch.php');
?>
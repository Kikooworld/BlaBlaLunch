<?php
	include("database_connection.php");
	
	$name = $_POST['name'];
	$restaurant_id = (int)$_POST['restaurants'];
	$seats = (int)$_POST['seats'];
	$time = $_POST['time'];
	
	//Connect to database
	$db = ConnectToDataBase();
	
	//preparer la requete
	$req_pre = mysqli_prepare($db, "INSERT INTO `cars` (`owner`, `time`, `seats`, `id`, `restaurant_id`) VALUES (\"" . $name . "\", \"" . $time . "\", \"" . $seats . "\", NULL, \"" . $restaurant_id . "\");") or die(mysqli_error($db));
	echo "Request prepared";
	
	mysqli_set_charset( $db, 'utf8' );
		
	//executer la requete
	mysqli_stmt_execute($req_pre);
	echo "Request executed";
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	header('Location: ../index.php');
?>
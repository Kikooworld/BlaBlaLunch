<?php
	include("DataBaseConnection.php");
	
	$name = "titi";
	$restaurant_id = 1;
	$seats = 4;
	$time = "12:00:00";
	
	//Connect to database
	$db = ConnectToDataBase();
	
	//preparer la requete
	$req_pre = mysqli_prepare($db, "INSERT INTO `cars` (`owner`, `time`, `seats`, `id`, `restaurant_id`) VALUES (\"" . $name . "\", \"" . $time . "\", \"" . $seats . "\", NULL, \"" . $restaurant_id . "\");") or die(mysqli_error($db));
	echo "Request prepared";
	
	//executer la requete
	mysqli_stmt_execute($req_pre);
	echo "Request executed";
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	header('Location: index.html');
?>
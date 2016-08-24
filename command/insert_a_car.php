<?php
	header('content-type: text/html; charset=utf-8');
	include("database_connection.php");
	
	$name = utf8_decode($_POST['name']);
	$restaurant_id = (int)$_POST['restaurants'];
	$seats = (int)$_POST['seats'];
	$time = $_POST['time'];
	$take_away = 0;
	
	setcookie("username", $name, time() + (86400 * 30), '/');
	setcookie("time", $time, time() + (86400 * 30), '/');
	setcookie("seats", $seats, time() + (86400 * 30), '/');
	setcookie("restaurant", $restaurant_id, time() + (86400 * 30), '/');
	setcookie("takeaway", $take_away, time() + (86400 * 30), '/');
	
	if ($_POST['where'] == 'takeaway')
	{
		$take_away = 1;
	}
	
	//Connect to database
	$db = ConnectToDataBase();
	
	//preparer la requete
	$req_pre = mysqli_prepare($db, "INSERT INTO `cars` (`owner`, `time`, `seats`, `id`, `restaurant_id`, `take_away`) VALUES (\"" . $name . "\", \"" . $time . "\", \"" . $seats . "\", NULL, \"" . $restaurant_id . "\", \"" . $take_away . "\");") or die(mysqli_error($db));
		
	//executer la requete
	mysqli_stmt_execute($req_pre);
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	header('Location: ../index.php');
?>
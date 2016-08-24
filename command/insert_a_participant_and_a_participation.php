<?php
	header('content-type: text/html; charset=utf-8');
	include("database_connection.php");

	$carId = (int)$_POST['carId'];
	
	//Connect to database
	$db = ConnectToDataBase();
	
	//Requete insert a participant
	$name = $_POST['name'];
	
	setcookie("username", utf8_decode($name), time() + (86400 * 30), '/');
	
	$req_pre = mysqli_prepare($db, "INSERT INTO `participants` (`name`, `id`) VALUES (\"" . $name . "\", NULL);") or die(mysqli_error($db));
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_close($req_pre);
	
	//Requete select participant id
	$req_pre = mysqli_prepare($db, "SELECT `id` FROM `participants` WHERE `name` = \"". $name ."\";") or die(mysqli_error($db));
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $participant_id);
	mysqli_stmt_store_result($req_pre);
	mysqli_stmt_fetch($req_pre);
	
	//Requete insert a participation
	$car_id = (int)$_POST['carId'];
	$req_pre2 = mysqli_prepare($db, "INSERT INTO `participations` (`car_id`, `id`, `comment`, `participant_id`) VALUES (\"" . $car_id . "\", NULL, \"" . $comment . "\", \"" . $participant_id . "\");") or die(mysqli_error($db));
	$req_pre2 = mysqli_prepare($db, "INSERT INTO `participations` (`car_id`, `id`, `participant_id`) VALUES (\"" . $car_id . "\", NULL, \"" . $participant_id . "\");") or die(mysqli_error($db));
	mysqli_stmt_execute($req_pre2);	
	mysqli_stmt_free_result($req_pre);
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	header('Location: ../index.php');
?>
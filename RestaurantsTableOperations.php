<?php
	include("DataBaseConnection.php");
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	
	//Connect to database
	$db = ConnectToDataBase();
	
	//preparer la requete
	$req_pre = mysqli_prepare($db, "INSERT INTO `restaurants` (`name`, `address`) VALUES (\"" . $name . "\", \"" . $address . "\");") or die(mysqli_error($db));
	echo "Request prepared";
	
	//executer la requete
	mysqli_stmt_execute($req_pre);
	echo "Request executed";
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	header('Location: index.php');
?>
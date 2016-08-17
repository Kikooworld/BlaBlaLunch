<?php
	include("DataBaseConnection.php");
	
	$name = "titi";
	$restaurant_id = 1;
	$seats = 4;
	$time = "12:00:00";
	
	// $db = ConnectToDataBase();
	if ($db = mysqli_connect('localhost', 'root', '', 'blablalunch'))
	{
		echo 'Connection success';
	}
	else
	{
		echo 'Connection error';
	}
	
	//preparer la requete
	$req_pre = mysqli_prepare($db, "INSERT INTO `cars` (`owner`, `time`, `seats`, `id`, `restaurant_id`) VALUES (\"" . $name . "\", \"" . $time . "\", \"" . $seats . "\", NULL, \"" . $restaurant_id . "\");") or die(mysqli_error($db));
	echo "Request prepared";
	
	//executer la requete
	mysqli_stmt_execute($req_pre);
	echo "Request executed";
	
	if (mysqli_close($db))
	{
		echo 'Disconnection success';
	}
	else
	{
		echo 'Disconnection error';
	}
	
?>
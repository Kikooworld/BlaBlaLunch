<?php
	header('content-type: text/html; charset=utf-8');
	include("insert_a_car.php");
	
	$name = $_POST['name'];
	$restaurant_id = (int)$_POST['restaurants'];
	$seats = (int)$_POST['seats'];
	$time = $_POST['time'];
	$take_away = 0;
	if ($_POST['where'] == 'takeaway')
	{
		$take_away = 1;
	}

	setcookie("username", utf8_decode($name), time() + (86400 * 30), '/');
	setcookie("time", $time, time() + (86400 * 30), '/');
	setcookie("seats", $seats, time() + (86400 * 30), '/');
	setcookie("restaurant", $restaurant_id, time() + (86400 * 30), '/');
	setcookie("takeaway", $take_away, time() + (86400 * 30), '/');
	
	//Connect to database
	$db = ConnectToDataBase();
	
	//Check if car already exists
	$req_pre = mysqli_prepare($db, "SELECT cars.id FROM cars WHERE cars.owner = ?;") or die(mysqli_error($db));
    mysqli_stmt_bind_param($req_pre, "s", $name);
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $existingId);
	mysqli_stmt_fetch($req_pre);
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	if ($existingId == "")
	{
		InsertACar($name, $restaurant_id, $seats, $time, $take_away);
	}
	else
	{
		$message = "Un covoitureur avec le même conducteur existe déjà dans la base de données. Voulez-vous mettre à jour les données ?";
		echo "<script>
		var update = confirm(\"$message\");
		if (update)
		{
			location.href = \"update_car.php?id=$existingId&restaurant=$restaurant_id&seats=$seats&time=$time&away=$take_away\";
		}
		else
		{
			window.location=\"../suggest_a_blablalunch.php\";
		}
		</script>";
	}
?>
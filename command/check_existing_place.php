<?php
	header('content-type: text/html; charset=utf-8');
	include("insert_a_place.php");
	
	$name = utf8_decode($_POST['name']);
	$address = utf8_decode($_POST['address']);
	
	//Connect to database
	$db = ConnectToDataBase();
	
	//Check if restaurant already exists
	$req_pre = mysqli_prepare($db, "SELECT restaurants.id, restaurants.address FROM restaurants WHERE restaurants.name = \"".$name."\";") or die(mysqli_error($db));
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $existingId, $existingAddress);
	mysqli_stmt_fetch($req_pre);
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	if ($existingId == "")
	{
		InsertAPlace($name, $address);
	}
	else
	{
		if ($address == "" || ctype_space($address) )
		{
			echo "<script>alert(\"Un restaurant avec le même nom existe déjà dans la base de données.\")</script>";
			header('Location: ../suggest_a_blablalunch.php');
		}
		else
		{
			$message = "";
			if ($existingAddress == "" || ctype_space($existingAddress) )
			{
				$message = "Un restaurant avec le même nom existe déjà dans la base de données. Voulez-vous mettre à jour l'adresse ?";
			}
			else
			{
				$message = "Un restaurant avec le même nom existe déjà dans la base de données. Voulez-vous remplacer l'adresse: '".$existingAddress."' par '".$address."' ?";
			}
			echo "<script>
			var update = confirm(\"$message\");
			if (update)
			{
				location.href = \"update_place.php?id=$existingId&address=$address\";
			}
			else
			{
				window.location=\"../suggest_a_blablalunch.php\";
			}
			</script>";
		}
	}
?>
<?php
	header('content-type: text/html; charset=utf-8');
	include("insert_a_place.php");
	
	$name = $_POST['name'];
	
	//Connect to database
	$db = ConnectToDataBase();
	
	//Check if restaurant already exists
	$req_pre = mysqli_prepare($db, "SELECT restaurants.id FROM restaurants WHERE restaurants.name = ?;") or die(mysqli_error($db));
    mysqli_stmt_bind_param($req_pre, "s", $name);
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $existingId);
	mysqli_stmt_fetch($req_pre);
			
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	if ($existingId == "")
	{
		InsertAPlace($name);
	}
	else
	{
		echo 
			"<script>
				alert(\"Un restaurant avec le même nom existe déjà dans la base de données.\");
				window.location=\"../suggest_a_blablalunch.php\";
			</script>";
	}
?>
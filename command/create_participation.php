<?php
	header('content-type: text/html; charset=utf-8');
	include("select_participant_id.php");
	include("insert_a_participant.php");
	include("insert_a_participation.php");
	include("database_connection.php");
	
	$name = $_POST['name'];
	$carId = (int)$_POST['carId'];
	
	setcookie("username", utf8_decode($name), time() + (86400 * 30), '/');
	
	//Get participant id
	$participantId = SelectParticipantId($name);
	if ($participantId == "")
	{
		InsertAParticipant(utf8_decode($name));
		$participantId = SelectParticipantId($name);
	}
	
	//Check if participations with same participant exists
	$db = ConnectToDataBase();
	
	//Check if car already exists
	$req_pre = mysqli_prepare($db, "SELECT participations.id FROM participations WHERE participations.participant_id = \"".$participantId."\";") or die(mysqli_error($db));
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $participationId);
	mysqli_stmt_fetch($req_pre);
	
	//Disconnect from database
	DisconnectFromDatabase($db);
	
	if ($participationId == "")
	{
		InsertAParticipation($carId, $participantId);
	}
	else
	{
		$message = "Un covoitureur avec le même nom a déjà réservé un covoiturage. Voulez-vous mettre à jour les données ?";
		echo "<script>
		var update = confirm(\"$message\");
		if (update)
		{
			location.href = \"update_participation.php?participation=$participationId&participant=$participantId&car=$carId\";
		}
		else
		{
			window.location=\"../index.php\";
		}
		</script>";
	}

?>
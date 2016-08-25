<?php
	header('content-type: text/html; charset=utf-8');
	
	function InsertAParticipation($car_id, $participant_id)
	{		
		//Connect to database
		$db = ConnectToDataBase();
			
		//Requete insert a participant
		$req_pre = mysqli_prepare($db, "INSERT INTO `participations` (`car_id`, `id`, `participant_id`) VALUES (\"" . $car_id . "\", NULL, \"" . $participant_id . "\");") or die(mysqli_error($db));
		mysqli_stmt_execute($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
		
		header('Location: ../index.php');
	}
?>
<?php
	header('content-type: text/html; charset=utf-8');
	
	function InsertAParticipant($name)
	{		
		//Connect to database
		$db = ConnectToDataBase();
			
		//Requete insert a participant
		$req_pre = mysqli_prepare($db, "INSERT INTO `participants` (`name`, `id`) VALUES (\"" . $name . "\", NULL);") or die(mysqli_error($db));
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_close($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
	}
?>
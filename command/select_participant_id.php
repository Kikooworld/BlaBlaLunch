<?php
	header('content-type: text/html; charset=utf-8');
	
	function SelectParticipantId($name)
	{		
		//Connect to database
		$db = ConnectToDataBase();
			
		//Check if participant already exists
		$req_pre = mysqli_prepare($db, "SELECT id FROM participants WHERE name=?;") or die(mysqli_error($db));
        mysqli_stmt_bind_param($req_pre, "s", $name);
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $id);
		mysqli_stmt_fetch($req_pre);
	
		//Disconnect from database
		DisconnectFromDatabase($db);
		
		return $id;
	}
?>
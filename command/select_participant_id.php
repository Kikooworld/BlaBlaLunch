<?php
	header('content-type: text/html; charset=utf-8');
	include("insert_a_participant.php");
	
	function SelectParticipantId($name)
	{		
		//Connect to database
		$db = ConnectToDataBase();
			
        //Lock table
        mysqli_query($db, "LOCK TABLES participants WRITE;");
		
		//Check if participant already exists
		$req_pre = mysqli_prepare($db, "SELECT id FROM participants WHERE name=?;") or die(mysqli_error($db));
        mysqli_stmt_bind_param($req_pre, "s", $name);
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $id);
		mysqli_stmt_fetch($req_pre);
	
        if ($id == "")
        {
            InsertAParticipant($db, $name);
            
            $req_pre2 = mysqli_prepare($db, "SELECT id FROM participants WHERE name=?;") or die(mysqli_error($db));
            mysqli_stmt_bind_param($req_pre2, "s", $name);
            mysqli_stmt_execute($req_pre2);
            mysqli_stmt_bind_result($req_pre2, $id);
            mysqli_stmt_fetch($req_pre2);
        }
    
        //Unlock table
        mysqli_query($db, "UNLOCK TABLES;");
        
		//Disconnect from database
		DisconnectFromDatabase($db);
		
		return $id;
	}
?>
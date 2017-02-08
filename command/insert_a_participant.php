<?php
	header('content-type: text/html; charset=utf-8');
	
	function InsertAParticipant($db, $name)
	{		
		//Requete insert a participant
		$req_pre = mysqli_prepare($db, "INSERT INTO `participants` (`name`, `id`) VALUES (?, NULL);") or die(mysqli_error($db));
        mysqli_stmt_bind_param($req_pre, "s", $name);
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_close($req_pre);
	}
?>
<?php
	header('content-type: text/html; charset=utf-8');
	include("database_connection.php");
	
	function InsertAPlace($name)
	{
		//Connect to database
		$db = ConnectToDataBase();
        
        mysqli_query($db, "LOCK TABLES restaurants WRITE;");
		
        //Check if restaurant already exists
        $req_pre = mysqli_prepare($db, "SELECT restaurants.id FROM restaurants WHERE restaurants.name = ?;") or die(mysqli_error($db));
        mysqli_stmt_bind_param($req_pre, "s", $name);
        mysqli_stmt_execute($req_pre);
        mysqli_stmt_bind_result($req_pre, $existingId);
        mysqli_stmt_fetch($req_pre);
        
        if ($existingId == "")
        {
            //preparer la requete
            $req_pre2 = mysqli_prepare($db, "INSERT INTO `restaurants` (`name`) VALUES (?);") or die(mysqli_error($db));
            mysqli_stmt_bind_param($req_pre2, "s", $name);
            
            //executer la requete
            mysqli_stmt_execute($req_pre2);
            
            //Unlock table
            mysqli_query($db, "UNLOCK TABLES;");
            
            //Disconnect from database
            DisconnectFromDatabase($db);
            
            header('Location: ../suggest_a_blablalunch.php');
        }
        else
        {
            //Unlock table
            mysqli_query($db, "UNLOCK TABLES;");
            
            //Disconnect from database
            DisconnectFromDatabase($db);
            
            echo 
                "<script>
                    alert(\"Un restaurant avec le même nom existe déjà dans la base de données.\");
                    window.location=\"../suggest_a_blablalunch.php\";
                </script>";
        }
	}
?>
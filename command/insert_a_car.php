<?php
	header('content-type: text/html; charset=utf-8');
	include("database_connection.php");
	
	function InsertACar($name, $restaurant_id, $seats, $time, $take_away)
	{		
		//Connect to database
		$db = ConnectToDataBase();
		
        mysqli_query($db, "LOCK TABLES cars WRITE;");
        
        //Check if car already exists
        $req_pre = mysqli_prepare($db, "SELECT cars.id FROM cars WHERE cars.owner = ?;") or die(mysqli_error($db));
        mysqli_stmt_bind_param($req_pre, "s", $name);
        mysqli_stmt_execute($req_pre);
        mysqli_stmt_bind_result($req_pre, $existingId);
        mysqli_stmt_fetch($req_pre);

        if ($existingId == "")
        {
            //preparer la requete
            $req_pre2 = mysqli_prepare($db, "INSERT INTO `cars` (`owner`, `time`, `seats`, `id`, `restaurant_id`, `take_away`) VALUES (?, \"" . $time . "\", \"" . $seats . "\", NULL, \"" . $restaurant_id . "\", \"" . $take_away . "\");") or die(mysqli_error($db));
            mysqli_stmt_bind_param($req_pre2, "s", $name);
                
            //executer la requete
            mysqli_stmt_execute($req_pre2);
            
            //Unlock table
            mysqli_query($db, "UNLOCK TABLES;");
            
            //Disconnect from database
            DisconnectFromDatabase($db);
            
            header('Location: ../index.php');
        }
        else
        {
            //Unlock table
            mysqli_query($db, "UNLOCK TABLES;");
            
            //Disconnect from database
            DisconnectFromDatabase($db);
            
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
	}
?>
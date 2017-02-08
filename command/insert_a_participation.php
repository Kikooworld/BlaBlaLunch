<?php
	header('content-type: text/html; charset=utf-8');
	
	function InsertAParticipation($car_id, $participant_id)
	{
		//Connect to database
		$db = ConnectToDataBase();
        
        //Lock table
        mysqli_query($db, "LOCK TABLES participations WRITE, participants WRITE, cars WRITE;");
		
        //Check if a seat is still available
		$req_pre2 = mysqli_prepare($db, "SELECT participants.name FROM participations, participants WHERE participations.car_id = '$car_id;' AND participations.participant_id = participants.id;");
		mysqli_stmt_execute($req_pre2);
		mysqli_stmt_bind_result($req_pre2, $participantName);
		$participants = "";
		$participationsNb = 0;
		while (mysqli_stmt_fetch($req_pre2)) 
		{
			if ($participants == "")
			{
				$participants .= $participantName;
			}
			else
			{
				$participants .= "<br>".$participantName;
			}
			$participationsNb += 1;
		}
		mysqli_stmt_close($req_pre2);

		//Select car's properties
		$req_pre = mysqli_prepare($db,
		   "SELECT cars.seats FROM cars WHERE (cars.id = \"".$car_id."\");") or die(mysqli_error($db));
		
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $carSeats);
		mysqli_stmt_store_result($req_pre);
		mysqli_stmt_fetch($req_pre);
		
        if ($carSeats > $participationsNb)
        {
            //Check if participant is already in a participation
            $req_pre3 = mysqli_prepare($db, "SELECT participations.id FROM participations WHERE participations.participant_id = \"".$participant_id."\";") or die(mysqli_error($db));
            mysqli_stmt_execute($req_pre3);
            mysqli_stmt_bind_result($req_pre3, $participationId);
            mysqli_stmt_fetch($req_pre3);
        
            if ($participationId == "")
            {
                //Insert a participant
                $req_pre4 = mysqli_prepare($db, "INSERT INTO `participations` (`car_id`, `id`, `participant_id`) VALUES (\"" . $car_id . "\", NULL, \"" . $participant_id . "\");") or die(mysqli_error($db));
                mysqli_stmt_execute($req_pre4);
                
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
                
                echo '<script>
                var update = confirm("Un covoitureur avec le même nom a déjà réservé un covoiturage. Voulez-vous mettre à jour les données ?");
                if (update)
                {
                    location.href = "update_participation.php?participation=$participationId&participant=$participant_id&car=$car_id";
                }
                else
                {
                    window.location="../index.php";
                }
                </script>';
            }
		}
        else
        {
            //Unlock table
            mysqli_query($db, "UNLOCK TABLES;");
            
            //Disconnect from database
            DisconnectFromDatabase($db);
            echo '<script>
            alert("La réservation a échouée. La voiture sélectionnée a été remplie.");
            window.location="../index.php";
            </script>';
        }
	}
?>
<?php
	header('content-type: text/html; charset=utf-8');
	function GetCar($carId)
	{
		include("command/database_connection.php");
		include("command/get_cars.php");
		
		//Connect to database
		$db = ConnectToDataBase();
		
		//Calcul des participants
		$req_pre2 = mysqli_prepare($db, "SELECT participants.name FROM participations, participants WHERE participations.car_id = '$carId;' AND participations.participant_id = participants.id;");
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
		   "SELECT cars.owner, cars.time, cars.seats, cars.take_away, restaurants.id, restaurants.name
			FROM cars, restaurants
			WHERE (cars.id = \"".$carId."\" AND cars.restaurant_id = restaurants.id);") or die(mysqli_error($db));
		
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $carOwner, $carTime, $carSeats, $carTakeaway, $restaurantId, $restaurantName);
		mysqli_stmt_store_result($req_pre);
		mysqli_stmt_fetch($req_pre);
		
		$availableSeats = $carSeats - $participationsNb;
		$checked = "";
		if ($carTakeaway == 1)
		{
			$checked =  "checked";
		}
		
		//Build html
		echo "<td>".$restaurantName."</td>";
		echo "<td><input type=\"checkbox\"  disabled ".$checked."></td>";
		echo "<td>".$carTime."</td>";
		echo "<td>".$carOwner."</td>";
		echo "<td>".$availableSeats."/".$carSeats."</td>";
		echo "<td>".$participants."</td>";
		
		mysqli_stmt_free_result($req_pre);
		mysqli_stmt_close($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
	}
?>
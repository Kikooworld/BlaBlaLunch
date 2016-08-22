<?php
	function BuildHtml($db, $request, $useReservedSeats)
	{
		$req_pre = mysqli_prepare($db, $request) or die(mysqli_error($db));
		
		mysqli_set_charset( $db, 'utf8' );
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $carId, $carOwner, $carTime, $carSeats, $carTakeaway, $restaurantId, $restaurantName, $reservedSeats);

		while (mysqli_stmt_fetch($req_pre)) 
		{						
			$availableSeats = $carSeats;
			if ($useReservedSeats)
			{
				$availableSeats = $carSeats - $reservedSeats;
			}
			$checked = "";
			if ($carTakeaway == 1)
			{
				$checked =  "checked";
			}

			echo "<form action=\"book_a_seat.php\" method=\"post\">";
			echo "<tr>";
			echo "<td>".$restaurantName."</td>";
			echo "<td><input type=\"checkbox\"  disabled ".$checked."></td>";
			echo "<td>".$carTime."</td>";
			echo "<td>".$carOwner."</td>";
			echo "<td>".$availableSeats."/".$carSeats."</td>";
			echo "<td><input type=\"hidden\" name=\"carId\" value=\"".$carId."\"></td>";
			echo "<td><input type=\"submit\" value=\"Réserver une place\"/></td>";
			echo "</tr>";
			echo "</form>";
		}
		
		mysqli_stmt_close($req_pre);
	}

	function GetCars()
	{
		include("command/database_connection.php");
		
		//Connect to database
		$db = ConnectToDataBase();
		
		//Requete pour récupérer les voitures sans passagers
		BuildHtml($db, "SELECT cars.id, cars.owner, cars.time, cars.seats, cars.take_away, restaurants.id, restaurants.name, COUNT(*)
			FROM cars, restaurants
			WHERE cars.id NOT IN
			  ( SELECT cars.id
				FROM cars, restaurants, participations
				WHERE cars.restaurant_id = restaurants.id AND cars.id = participations.car_id
				GROUP BY cars.id)
			GROUP BY cars.id;", false);
		
		BuildHtml($db, "SELECT cars.id, cars.owner, cars.time, cars.seats, cars.take_away, restaurants.id, restaurants.name, COUNT(*)
			FROM cars, restaurants, participations
			WHERE cars.restaurant_id = restaurants.id AND cars.id = participations.car_id
			GROUP BY cars.id;", true);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
	}
?>
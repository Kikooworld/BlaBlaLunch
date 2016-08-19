<?php
	function GetCars()
	{
		include("command/database_connection.php");
		
		//Connect to database
		$db = ConnectToDataBase();
		
		//preparer la requete
		$req_pre = mysqli_prepare($db,
		   "SELECT cars.id, cars.owner, cars.time, cars.seats, restaurants.id, restaurants.name, COUNT(*)
			FROM cars, restaurants, participations
			WHERE cars.restaurant_id = restaurants.id AND cars.id = participations.car_id
			GROUP BY cars.id;") or die(mysqli_error($db));
		
		mysqli_set_charset( $db, 'utf8' );
		
		//executer la requete
		mysqli_stmt_execute($req_pre);
		
		// Association des variables de résultat
		mysqli_stmt_bind_result($req_pre, $carId, $carOwner, $carTime, $carSeats, $restaurantId, $restaurantName, $reservedSeats);
		
		//lire la requete
		while (mysqli_stmt_fetch($req_pre)) 
		{						
			$availableSeats = $carSeats - $reservedSeats;

			echo "<form action=\"book_a_seat.php\" method=\"post\">";
			echo "<tr>";
			echo "<td>".$restaurantName."</td>";
			echo "<td>".$carTime."</td>";
			echo "<td>".$carOwner."</td>";
			echo "<td>".$availableSeats."/".$carSeats."</td>";
			echo "<td><input type=\"hidden\" name=\"carId\" value=\"".$carId."\"></td>";
			echo "<td><input type=\"submit\" value=\"Réserver une place\"/></td>";
			echo "</tr>";
			echo "</form>";
		}
		
		//Disconnect from database
		DisconnectFromDatabase($db);
	}
?>
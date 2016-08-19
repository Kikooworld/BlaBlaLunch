<?php
	function GetCars()
	{
		include("command/database_connection.php");
		
		//Connect to database
		$db = ConnectToDataBase();
		
		//Requete pour récupérer les voitures sans passagers
		$req_pre = mysqli_prepare($db,
		  "SELECT cars.id, cars.owner, cars.time, cars.seats, cars.id, restaurants.name, COUNT(*)
			FROM cars, restaurants
			WHERE cars.id NOT IN
			  ( SELECT cars.id
				FROM cars, restaurants, participations
				WHERE cars.restaurant_id = restaurants.id AND cars.id = participations.car_id
				GROUP BY cars.id);") or die(mysqli_error($db));
			
		mysqli_set_charset( $db, 'utf8' );
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $carId, $carOwner, $carTime, $carSeats, $restaurantId, $restaurantName, $reservedSeats);

		while (mysqli_stmt_fetch($req_pre)) 
		{						
			echo "<form action=\"book_a_seat.php\" method=\"post\">";
			echo "<tr>";
			echo "<td>".$restaurantName."</td>";
			echo "<td>".$carTime."</td>";
			echo "<td>".$carOwner."</td>";
			echo "<td>".$carSeats."/".$carSeats."</td>";
			echo "<td><input type=\"hidden\" name=\"carId\" value=\"".$carId."\"></td>";
			echo "<td><input type=\"submit\" value=\"Réserver une place\"/></td>";
			echo "</tr>";
			echo "</form>";
		}
		
		mysqli_stmt_close($req_pre);
		
		//Requete pour récupérer les voitures ayant des passagers
		$req_pre = mysqli_prepare($db,
		   "SELECT cars.id, cars.owner, cars.time, cars.seats, restaurants.id, restaurants.name, COUNT(*)
			FROM cars, restaurants, participations
			WHERE cars.restaurant_id = restaurants.id AND cars.id = participations.car_id
			GROUP BY cars.id;") or die(mysqli_error($db));
			
		mysqli_set_charset( $db, 'utf8' );
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $carId, $carOwner, $carTime, $carSeats, $restaurantId, $restaurantName, $reservedSeats);

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
		
		mysqli_stmt_close($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
	}
?>
<?php
	function GetCar($carId)
	{
		include("command/database_connection.php");
		
		//Connect to database
		$db = ConnectToDataBase();
		
		//Select car's properties
		$req_pre = mysqli_prepare($db,
		   "SELECT cars.owner, cars.time, cars.seats, restaurants.id, restaurants.name
			FROM cars, restaurants
			WHERE (cars.id = \"".$carId."\" AND cars.restaurant_id = restaurants.id);") or die(mysqli_error($db));
		
		mysqli_set_charset( $db, 'utf8' );
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $carOwner, $carTime, $carSeats, $restaurantId, $restaurantName);
		mysqli_stmt_store_result($req_pre);
		mysqli_stmt_fetch($req_pre);
		
		//Calcul du nombre de places restantes
		$req_pre2 = mysqli_prepare($db, "SELECT COUNT(*) FROM participations WHERE participations.car_id = '$carId;'") or die(mysqli_error($db));
				
		mysqli_stmt_execute($req_pre2);
		mysqli_stmt_bind_result($req_pre2, $participationsNb);
		mysqli_stmt_fetch($req_pre2);
		
		$availableSeats = $carSeats - $participationsNb;

		//Build html
		echo "<td>".$restaurantName."</td>";
		echo "<td>".$carTime."</td>";
		echo "<td>".$carOwner."</td>";
		echo "<td>".$availableSeats."/".$carSeats."</td>";
		
		mysqli_stmt_free_result($req_pre);
		mysqli_stmt_close($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
	}
?>
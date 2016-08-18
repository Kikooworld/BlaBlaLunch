<?php
	function GetCars()
	{
		include("command/database_connection.php");
		
		//Connect to database
		$db = ConnectToDataBase();
		
		//preparer la requete
		$req_pre = mysqli_prepare($db, "SELECT cars.id, cars.owner, cars.time, cars.seats, restaurants.id, restaurants.name FROM cars, restaurants WHERE cars.restaurant_id = restaurants.id;") or die(mysqli_error($db));
		
		mysqli_set_charset( $db, 'utf8' );
		
		//executer la requete
		mysqli_stmt_execute($req_pre);
		
		// Association des variables de résultat
		mysqli_stmt_bind_result($req_pre, $carId, $carOwner, $carTime, $carSeats, $restaurantId, $restaurantName);

		//lire la requete
		while (mysqli_stmt_fetch($req_pre)) 
		{
			echo "<tr>";
					echo "<td>".$restaurantName."</td>";
					echo "<td>".$carTime."</td>";
					echo "<td>".$carOwner."</td>";
					echo "<td>".$carSeats."</td>";
					echo "<td><input type=\"submit\" value=\"Réserver une place\" /></td>";
			echo "</tr>";
		}
		
		// Fermeture de la commande
		mysqli_stmt_close($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
	}
?>
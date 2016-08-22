<?php
	function BuildHtml($db, $request, $useReservedSeats)
	{
		mysqli_set_charset( $db, 'utf8' );
		
		$result = mysqli_query($db, $request);
		if (!$result)
		{
			die(mysqli_error($db));
		}
		
		$rows = [];
		while($row = mysqli_fetch_array($result))
		{
			$rows[] = $row;
		}
		
		foreach($rows as &$row)
		{			
			$availableSeats = $row['carSeats'];
			$participants = "";
			if ($useReservedSeats)
			{
				$availableSeats = $row['carSeats'] - $row['participationsCount'];
				$req_pre = mysqli_prepare($db, "SELECT participants.name FROM participations, participants WHERE participations.car_id = ".$row['carId']." AND participations.participant_id = participants.id;") or die(mysqli_error($db));
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre, $participantName);
				
				while (mysqli_stmt_fetch($req_pre)) 
				{
					if ($participants == "")
					{
						$participants .= $participantName;
					}
					else
					{
						$participants .= "<br>".$participantName;
					}
				}
			}
			$checked = "";
			if ($row['carTakeaway'] == 1)
			{
				$checked =  "checked";
			}

			echo "<form action=\"book_a_seat.php\" method=\"post\">";
			echo "<tr>";
			echo "<td>".$row['restaurantName']."</td>";
			echo "<td><input type=\"checkbox\"  disabled ".$checked."></td>";
			echo "<td>".$row['carTime']."</td>";
			echo "<td>".$row['carOwner']."</td>";
			echo "<td>".$availableSeats."/".$row['carSeats']."</td>";
			echo "<td>".$participants."</td>";
			echo "<td><input type=\"hidden\" name=\"carId\" value=\"".$row['carId']."\"></td>";
			echo "<td><input type=\"submit\" value=\"Réserver une place\"/></td>";
			echo "</tr>";
			echo "</form>";
		}
		
		// mysqli_stmt_close($req_pre);
	}

	function GetCars()
	{
		include("command/database_connection.php");
		
		//Connect to database
		$db = ConnectToDataBase();
		
		//Requete pour récupérer les voitures sans passagers
		BuildHtml($db, "SELECT cars.id AS carId, cars.owner AS carOwner, cars.time AS carTime, cars.seats AS carSeats, cars.take_away AS carTakeaway, cars.restaurant_id AS restaurantId, restaurants.name AS restaurantName, COUNT(*) AS participationsCount
			FROM cars, restaurants
			WHERE cars.restaurant_id = restaurants.id AND cars.id NOT IN
			  ( SELECT cars.id
				FROM cars, restaurants, participations
				WHERE cars.restaurant_id = restaurants.id AND cars.id = participations.car_id
				GROUP BY cars.id)
			GROUP BY cars.id;", false);
		
		BuildHtml($db, "SELECT cars.id AS carId, cars.owner AS carOwner, cars.time AS carTime, cars.seats AS carSeats, cars.take_away AS carTakeaway, cars.restaurant_id AS restaurantId, restaurants.name AS restaurantName, COUNT(*) AS participationsCount
			FROM cars, restaurants, participations
			WHERE cars.restaurant_id = restaurants.id AND cars.id = participations.car_id
			GROUP BY cars.id;", true);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
	}
?>
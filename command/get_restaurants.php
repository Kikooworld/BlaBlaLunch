<?php
	function GetRestaurants()
	{
		include("command/database_connection.php");
		
		//Connect to database
		$db = ConnectToDataBase();
		
		//preparer la requete
		$req_pre = mysqli_prepare($db, "SELECT `id`, `name` FROM `restaurants`;") or die(mysqli_error($db));
		
		//executer la requete
		mysqli_stmt_execute($req_pre);
		
		// Association des variables de résultat
		mysqli_stmt_bind_result($req_pre, $restaurantId, $restaurantName);

		echo "<select name=\"restaurants\">";
		//lire la requete
		while (mysqli_stmt_fetch($req_pre)) 
		{
			echo "<option value=\"".$restaurantId."\">".$restaurantName."</option>";
		}
		echo "</select>";
		
		// Fermeture de la commande
		mysqli_stmt_close($req_pre);
		
		//Disconnect from database
		DisconnectFromDatabase($db);
	}
?>
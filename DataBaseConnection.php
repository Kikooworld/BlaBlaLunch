<?php

	function ConnectToDataBase()
	{	
		// on se connecte à MySQL
		if ($db = mysqli_connect('localhost', 'root', ''))
		{
			echo 'Connection success';
		}
		else
		{
			echo 'Connection error';
		}
		return $db;
	}
	
	function DisconnectFromDatabase($db)
	{
		// on ferme la connexion à mysql
		if (mysqli_close($db))
		{
			echo 'Disconnection success';
		}
		else
		{
			echo 'Disconnection error';
		}
	}
	
?>

<?php

	function ConnectToDataBase()
	{	
		// on se connecte à MySQL
		if (!($db = mysqli_connect('localhost', 'root', '', 'blablalunch')))
		{
			echo 'Connection error';
		}
		mysqli_set_charset( $db, 'utf8' );

		return $db;
	}
	
	function DisconnectFromDatabase($db)
	{
		// on ferme la connexion à mysql
		if (!(mysqli_close($db)))
		{
			echo 'Disconnection error';
		}
	}
	
?>

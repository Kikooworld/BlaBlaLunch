<html>
	<head>
		<!-- En-tête de la page -->
		<meta charset="utf-8" />
		<link rel="icon" href="img/favicon.ico" />
		<link rel="stylesheet" href="style.css" />
		<title>Blabla Lunch test</title>
	</head>
	<body>
		<!-- Corps de la page -->		
		<a href="index.html" title="Cliquer ici pour retourner à la page d'accueil">
			<img src="img/100_BlaBlaLunch_logo.png" alt="BlaBlaLunch Logo" />
		</a>
		<h1>Suggest a BlaBla Lunch</h1>
		<table border="0" cellspacing="10" cellpadding="0">
			<tbody>
				<tr valign="top">
					<td>Nom :</td>
					<td><input type="text" name="name" style="width:100%"><br></td>
				</tr>
				<tr valign="top">
					<td>Restaurant :</td>
					<td> 
						<select name="restaurants" style="width:100%">
							<option value="geant">1</option>
							<option value="cube">2</option>
							<option value="geantGalery">3</option>
							<option value="bakery">4</option>
							<option value="another">Autre ...</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Heure de départ :</td>
					<td><input name="time" type="text" pattern="([01]?[0-9]|2[0-3])(([:][0-5][0-9])|([h]([0-5][0-9]){0,1}))" style="width:100%"></td>
				</tr>
				<tr valign="top">
					<td>Nombre de place(s) disponible(s) :</td>
					<td><input name="seats" type="number" min="1" max="8" style="width:100%"><br></td>
				</tr>
				<tr valign="top">
					<td/>
					<td>
						<input type="reset" value="Annuler" style="float: right;">
						<form action="CarsTableOperations.php" method="post">
							<p>
								<input type="submit" value="Soumettre" style="float: right;">
							</p>
						</form>
						<!--input type="submit" value="Soumettre" style="float: right;" onClick="SaveCar(\'' + name.value + '\', \'' + restaurants.selectedIndex + '\', \'' + seats.value + '\', \'' + time.value + '\')"-->
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>
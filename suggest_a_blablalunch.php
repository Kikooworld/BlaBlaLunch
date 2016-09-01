<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<?php include('global/head.html'); ?>
		<title>MiamMiamCar - Proposer un covoiturage</title>
	</head>
	<body>
		<header>
			<!-- En-tête de la page -->
			<?php include('global/header.html'); ?>
		</header>
		<section>
			<div id="header_hr"/>
		</section>

		<!-- Corps de la page -->		
		<section>
			<h1>Proposer un covoiturage</h1>

			<form action="command/check_existing_car.php" method="post">
				<table class="form_table">
					<tbody>
						<tr>
							<td>Nom :</td>
							<td>
								<input type="text" name="name" required = "required" value="<?php if(isset($_COOKIE['username'])){echo utf8_encode($_COOKIE['username']);} else {echo "";} ?>"/>
							</td>
						</tr>
						<tr>
							<td>Lieu :</td>
							<td> 
								<?php
									include('command/get_restaurants.php');
									GetRestaurants();
								?>
							</td>
							<td> 
								<a class="link_button" href="add_a_place.php">Ajouter un lieu</a>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="radio" name="where" value="takeaway" checked="true"> À emporter<br></input>
								<input type="radio" name="where" value="site" > Sur place</input>
							</td>
						</tr>
						<tr>
							<td>Heure de départ :</td>
							<td>
								<input name="time" type="text" title="Veuillez entrer une heure au format 'hh:mm' comprise entre 11:00 et 14:00" pattern="((1[1-3])([:][0-5][0-9]))|(14:00)" required = "required" placeholder="hh:mm" value="<?php if(isset($_COOKIE['time'])){echo $_COOKIE['time'];} else {echo "";} ?>"/>
							</td>
						</tr>
						<tr>
							<td>Nombre de place(s) disponible(s) :</td>
							<td>
								<input type="number" name="seats" min="1" max="6" required = "required" value="<?php if(isset($_COOKIE['seats'])){echo $_COOKIE['seats'];} else {echo "";} ?>"/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Proposer" />
								<a class="link_button" href="index.php">Annuler</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</section>
		
		<!-- Pied de page -->
		<footer>
			<?php include('global/footer.html'); ?>
		</footer>
	</body>
</html>
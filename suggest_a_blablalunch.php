<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<?php include('global/head.html'); ?>
		<title>BlablaLunch - Suggérer un BlaBlaLunch</title>
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
			<h1>Suggérer un BlaBlaLunch</h1>

			<form action="command/insert_a_car.php" method="post">
				<table class="form_table">
					<tbody>
						<tr>
							<td>Nom :</td>
							<td>
								<input type="text" name="name" />
							</td>
						</tr>
						<tr>
							<td>Restaurant :</td>
							<td> 
								<?php
									include('command/get_restaurants.php');
									GetRestaurants();
								?>
							</td>
							<td> 
								<a class="link_button" href="add_a_restaurant.php">Ajouter un restaurant</a>
							</td>
						</tr>
						<tr>
							<td>Heure de départ :</td>
							<td>
								<input name="time" type="text" pattern="([01]?[0-9]|2[0-3])(([:][0-5][0-9])|([h]([0-5][0-9]){0,1}))(([:][0-5][0-9])|([h]([0-5][0-9]){0,1}))" placeholder = "12:00:00"/>
							</td>
						</tr>
						<tr>
							<td>Nombre de place(s) disponible(s) :</td>
							<td>
								<input type="number" name="seats" min="1" max="8" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Soumettre" />
								<a class="link_button" href="index.php">Cancel</a>
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
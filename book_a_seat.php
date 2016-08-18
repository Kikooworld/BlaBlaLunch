<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<?php include('global/head.html'); ?>
		<title>BlablaLunch - Réserver une place</title>
	</head>

	<body>
		<header>
			<!-- En-tête de la page -->
			<?php include('global/header.html'); ?>
		</header>
		<section>
			<div id="header_hr"/>
		</section>

		<section>
			<h1>Réserver une place</h1>
			
			<table class="lunch_table">
				<tr>
					<thead>
						<th>Restaurant</th>
						<th>Heure de départ</th>
						<th>Conducteur</th>
						<th>Places disponibles</th>
					</thead>
				</tr>
				<tr>
					<?php 
						include('command/get_car.php');
						GetCar($_POST['carId']);
					?>
				</tr>
			</table>
			<br/>
			<form action="command/insert_a_participant_and_a_participation.php" method="post">
				<table border="0" cellspacing="10" cellpadding="0">
					<tbody>
						<tr>
							<td>Nom :</td>
							<td>
								<input type="text" name="name" class="form_text" />
							</td>
						</tr>
						<tr>
							<td>Commentaire :</td>
							<td>
								<textarea name="comment" class="form_textarea"> </textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type="hidden" name="carId" value="<?php echo $_POST['carId']; ?>"/>
								<input type="submit" value="Réserver"/>
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
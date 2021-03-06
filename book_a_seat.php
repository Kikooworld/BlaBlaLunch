<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<?php include('global/head.html'); ?>
		<title>MiamMiamCar - Réserver une place</title>
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
						<th>Lieu</th>
						<th>À emporter</th>
						<th>Heure de départ</th>
						<th>Conducteur</th>
						<th>Place(s) disponible(s)</th>
						<th>Participant(s)</th>
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
			<form action="command/create_participation.php" method="post">
				<table border="0" cellspacing="10" cellpadding="0">
					<tbody>
						<tr>
							<td>Nom :</td>
							<td>
								<input type="text" name="name" class="form_text" required="required" value="<?php if(isset($_COOKIE['username'])){echo utf8_encode($_COOKIE['username']);} else {echo "";} ?>"/>
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
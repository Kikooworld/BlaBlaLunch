<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<?php include('global/head.html'); ?>
		<title>BlablaLunch - Page d'accueil</title>
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
			<h1>Bienvenue sur BlaBlaLunch !</h1>
			<a class="link_button" href="suggest_a_blablalunch.php" title="Cliquer ici pour proposer un BlaBlaLunch">Proposer un BlaBlaLunch</a>
		</section>
		<br/>
		<section>
			<table class="lunch_table">
				<tr>
					<thead>
						<th>Lieu</th>
						<th>À emporter</th>
						<th>Heure de départ</th>
						<th>Conducteur</th>
						<th>Places disponibles</th>
						<th/>
					</thead>
				</tr>
				<?php
					include('command/get_cars.php');
					GetCars();
				?>
			</table>
		</section>

		<!-- Pied de page -->
		<footer>
			<?php include('global/footer.html'); ?>
		</footer>
	</body>
</html>
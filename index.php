<?php
	// Redirection après un délai de 5 secondes
	header('refresh:60;');
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<?php include('global/head.html'); ?>
		<title>MiamMiamCar - Page d'accueil</title>
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
			<h1>Bienvenue sur MiamMiamCar ! Le site de covoiturage pour aller déjeuner !</h1>
			<a class="link_button" href="suggest_a_blablalunch.php" title="Cliquer ici pour proposer un covoiturage">Proposer un covoiturage</a>
		</section>
		<br/>
			<div id="wrapper">
				<section>
					<div id="scrollable">
						<table class="lunch_table">
							<tr>
								<thead>
									<th>Lieu</th>
									<th>À emporter</th>
									<th>Heure de départ</th>
									<th>Conducteur</th>
									<th>Place(s) disponible(s)</th>
									<th>Participant(s)</th>
									<th/>
								</thead>
							</tr>
							<?php
								include('command/get_cars.php');
								GetCars();
							?>
						</table>
					</div>
				</section>
			</div>
		<!-- Pied de page -->
		<marquee behavior="alternate" >
			<img src="./img/ribbon/banh bao.jpg" width="70" height="60" >
			<img src="./img/ribbon/bo bun.jpg" width="70" height="60" >
			<img src="./img/ribbon/burger.jpg" width="70" height="60" >
			<img src="./img/ribbon/cheese.jpg" width="70" height="60" >
			<img src="./img/ribbon/crepe.jpg" width="70" height="60" >
			<img src="./img/ribbon/eclair.jpg" width="70" height="60" >
			<img src="./img/ribbon/fritures.jpg" width="70" height="60" >
			<img src="./img/ribbon/glace.jpg" width="70" height="60" >
			<img src="./img/ribbon/muffin.jpg" width="70" height="60" >
			<img src="./img/ribbon/nuggets.jpg" width="70" height="60" >
			<img src="./img/ribbon/panini.jpg" width="70" height="60" >
			<img src="./img/ribbon/pates sautees.jpg" width="70" height="60" >
			<img src="./img/ribbon/pates.jpg" width="70" height="60" >
			<img src="./img/ribbon/pizza.jpg" width="70" height="60" >
			<img src="./img/ribbon/poisson.jpg" width="70" height="60" >
			<img src="./img/ribbon/profiterolles.jpg" width="70" height="60" >
			<img src="./img/ribbon/riz.jpg" width="70" height="60" >
			<img src="./img/ribbon/salade.jpg" width="70" height="60" >
			<img src="./img/ribbon/sandwich.jpg" width="70" height="60" >
			<img src="./img/ribbon/steak.jpg" width="70" height="60" >
			<img src="./img/ribbon/sushi.jpg" width="70" height="60" >
			<img src="./img/ribbon/tarte.jpg" width="70" height="60" >
			<img src="./img/ribbon/wrap.jpg" width="70" height="60" >
		</marquee>
		<footer>
			<?php include('global/footer.html'); ?>
		</footer>
	</body>
</html>
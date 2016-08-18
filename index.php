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

			<a class="link_button" href="suggest_a_blablalunch.php" title="Cliquer ici pour suggérer un BlaBlaLunch">Suggérer un BlaBlaLunch</a>
			<a class="link_button" href="book_a_seat.php" title="Cliquer ici pour ajouter un restaurant">Réserver une place</a>
		</section>
		<br/>
		<section id="table_blablalunchs">
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script>
				function autoRefresh_section()
				{
					$("#table_blablalunchs").load("blablalunchs.php");// a function which will load data from other file after x seconds
				}
				setInterval('autoRefresh_section()', 5000); // refresh div after 5 secs
            </script>
		</section>

		<!-- Pied de page -->
		<footer>
			<?php include('global/footer.html'); ?>
		</footer>
	</body>
</html>
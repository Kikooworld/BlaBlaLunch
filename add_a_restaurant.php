<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<?php include('head.html'); ?>
		<title>BlablaLunch - Ajouter un restaurant</title>
	</head>

	<body>
		<header>
			<!-- En-tête de la page -->
			<?php include('header.html'); ?>
		</header>
		<section>
			<div id="header_hr"/>
		</section>

		<section>
			<h1>Ajouter un restaurant</h1>
			<form action="RestaurantsTableOperations.php" method="post">
				<table border="0" cellspacing="10" cellpadding="0">
					<tbody>
						<tr>
							<td>Nom :</td>
							<td>
								<input type="text" name="name" class="form_text" />
							</td>
						</tr>
						<tr>
							<td>Adresse :</td>
							<td>
								<textarea name="address" class="form_textarea"> </textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Ajouter"/>
								<a class="link_button" href="index.php">Annuler</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</section>

		<!-- Pied de page -->
		<footer>
			<?php include('footer.html'); ?>
		</footer>
	</body>
</html>
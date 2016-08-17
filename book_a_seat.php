<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<?php include('head.html'); ?>
		<title>BlablaLunch - Réserver une place</title>
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
			<h1>Réserver une place</h1>
			
			<table class="lunch_table">
				<tr>
					<thead>
						<th>Nom</th>
						<th>Restaurant</th>
						<th>Places disponibles</th>
					</thead>
				</tr>
				<tr>
					<td>Contenu 1</td>
					<td>Contenu 2</td>
					<td>Contenu 3</td>
				</tr>
			</table>
			<br/>
			<form action="ParticipationsTableOperations.php" method="post">
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
			<?php include('footer.html'); ?>
		</footer>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<?php include('global/head.html'); ?>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>BlablaLunch - Ajouter un lieu</title>
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
			<h1>Ajouter un lieu</h1>
			<form action="command/check_existing_place.php" method="post">
				<table border="0" cellspacing="10" cellpadding="0">
					<tbody>
						<tr>
							<td>Nom :</td>
							<td>
								<input type="text" name="name" class="form_text" required="required"/>
							</td>
						</tr>
						<tr>
							<td>Adresse :</td>
							<td>
								<textarea name="address" class="form_textarea"></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Ajouter"/>
								<a class="link_button" href="suggest_a_blablalunch.php">Annuler</a>
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
<!DOCTYPE html>
<html>
	<head>
		<!-- En-tête de la page -->
		<meta charset="utf-8" />
		<link rel="icon" href="img/favicon.ico" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
		<link rel="stylesheet" href="style.css" />
		<title>Blabla Lunch test</title>
	</head>

	<body>
		<header>
			<!-- En-tête de la page -->
			<?php include('header.html'); ?>
		</header>

		<!-- Corps de la page -->
		<section>
			<div id="header_hr"/>
		</section>


		<section>
			<h1>Ajouter un restaurant</h1>
			<table border="0" cellspacing="10" cellpadding="0">
				<tbody>
					<tr valign="top">
						<td>Nom :</td>
						<td>
							<input type="text" name="name" style="width:302px" />
						</td>
					</tr>
					<tr valign="top">
						<td>Adresse :</td>
						<td>
							<textarea name="textarea" style="width:300px;height:100px;"></textarea>
						</td>
					</tr>
					<tr valign="top">
						<td/>
						<td>
							<input type="submit" value="Add"/>
							<a class="link_button" href="index.php">Cancel</a>
						</td>
					</tr>
				</tbody>
			</table>

		</section>

		<!-- Pied de page -->
		<footer>
			<?php include('footer.html'); ?>
		</footer>
	</body>
</html>
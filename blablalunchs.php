<table class="lunch_table">
	<tr>
		<thead>
			<th>Lieu</th>
			<th>A emporter</th>
			<th>Heure de d&eacute;part</th>
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
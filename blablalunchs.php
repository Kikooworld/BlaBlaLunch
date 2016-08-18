<table class="lunch_table">
	<tr>
		<thead>
			<th>Restaurant</th>
			<th>Heure de d&eacute;part</th>
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
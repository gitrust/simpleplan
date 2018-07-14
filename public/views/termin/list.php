<div class="row">
<div class="nine columns">

	<h1><?= $data['title'] ?></h1>

	<?php echo Message::show(); ?>

	<form>
	
	<div>
	<input class="button-primary" value="Speichern" type="submit">
	</div>
	<table>
	<?php
	  if (!sizeof($data['rollen'])) {
		 echo '<div class="alert alert-info">Derzeit gibt es keine Produkte. <a href="' . DIR . 'products/add">Leg gleich welche an</a>!</div>';
	  }
	  else {
		 echo '<thead><tr><th>Termin/Rolle</th>';
		 foreach ($data['rollen'] as $rolle) {
			echo
			'<th>' . $rolle . '</th>';
		 }
		 echo '</tr></thead>';
		 
		 echo '<tbody>';
		 foreach ($data['termine'] as $termin) {
			echo '<tr>';
			echo '<td>' . $termin . '</td>';
			
			foreach ($data['rollen'] as $rolle) {
				echo '<td><input type="checkbox" name="" value=""></td>';
			}
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
	</form>
</div>
</div> <!-- / .termine -->
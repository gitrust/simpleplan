<div class="row">
<div class="nine columns">

	<h1><?= $data['title'] ?></h1>

	<?php echo Message::show(); ?>

	<form action="<?= DIR ?>termin/store/" method="POST">
	
	<div>
	<input class="button-primary" value="<?= I18n::tr('button.save'); ?>" type="submit">&nbsp;
	<input class="button-primary" value="<?= I18n::tr('button.update'); ?>" type="submit">
	</div>
	<table>
	<?php
	  if (!sizeof($data['roles'])) {
		 echo '<div class="alert alert-info">Derzeit gibt es keine Produkte. <a href="' . DIR . 'products/add">Leg gleich welche an</a>!</div>';
	  }
	  else {
		 echo '<thead><tr><th>' . I18n::tr('table.header.schedulelist') . '</th>';
		 foreach ($data['roles'] as $role) {
			echo '<th>' . $role["role"] . '</th>';
		 }
		 echo '</tr></thead>';
		 
		 echo '<tbody>';
		 foreach ($data['entries'] as $termin) {
			echo '<tr>';
			echo '<td>' . $termin["targetDate"] . '</td>';
			
			foreach ($data['roles'] as $role) {
				$key = $termin["id"] . "-" . $role["id"];
				echo '<td><input type="checkbox" name="entrykey" value="' . $key . '"></td>';
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
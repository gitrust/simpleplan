
<div class="row">
<div class="twelve columns">

	<h1><?= $data['title'] ?></h1>

	<!-- menu -->
	<div class="subnav">
		<a href="<?= DIR ?>termin/mylist/"><?= I18n::tr('link.mylist'); ?></a>
		| <a href="<?= DIR ?>termin/teamlist/"><?= I18n::tr('link.teamlist'); ?></a> 
	</div>

	<?php echo Message::show(); ?>	
	<div>
	&nbsp;
	</div>


	<table>
	<?php
	  if (!sizeof($data['roles'])) {
		 echo '<div class="alert alert-info">Derzeit gibt es keine Eintraege. !</div>';
	  }
	  else {
		 echo '<thead><tr><th>' . I18n::tr('table.header.entrylist') . '</th>';
		 foreach ($data['roles'] as $role) {
			echo '<th>' . $role["role"] . '</th>';
		 }
		 echo '</tr></thead>';
		 
		 echo '<tbody>';
		
		 foreach ($data['schedules'] as $schedule) {
			echo '<tr>';
			echo '<td>' . $schedule["targetDate"] . '</td>';
			
			foreach ($data['roles'] as $role) {
				$key = $schedule["id"] . "-" . $role["id"];
				$uarray = $data["entryUsers"][$key];
				$value = "";
				if (count($uarray) > 0) {
					$value = implode(', ',$uarray);
				}			
				echo '<td>' . $value . '</td>';
			}
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
</div>
</div> <!-- / .row -->
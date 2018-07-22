	<table class="stripe">
	<?php
	  if (!sizeof($data['schedules'])) {
		 echo '<div class="alert alert-info">Keine Termine</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.schedules') . '</th><th colspan="3">&nbsp;</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['schedules'] as $item) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($item["targetDate"]) . '</td>';
			echo '<td>' . htmlspecialchars($item["description"]) . '</td>';
			echo '<td><a href="' . DIR . 'admin/scheddel/' . htmlspecialchars($item["id"]) . '">' . I18n::tr('link.delete') . '</a></td>';
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
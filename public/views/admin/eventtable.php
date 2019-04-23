<div class="row">
	<div class="twelve columns">
	<table class="stripe">
	<?php
	  if (!sizeof($data['schedules'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
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
			if ($data['isadmin']) {
				echo '<td><a href="' . DIR . 'admin/eventdel/' . htmlspecialchars($item["id"]) . '">' . UiHelper::deleteIcon() . '</a></td>';
			} else {
				echo '<td>&nbsp;</td>';
			}
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
	</div>
</div>
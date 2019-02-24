<div class="row">
<div class="twelve columns">
	<table class="stripe">
	<?php
	  if (!sizeof($data['activites'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.activites') . '</th><th colspan="3">&nbsp;</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['activites'] as $activity) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($activity["name"]) . '</td>';
			echo '<td>' . htmlspecialchars($activity["description"]) . '</td>';
			echo '<td><a href="' . DIR . 'admin/activitydel/' . htmlspecialchars($activity["id"]) . '">' . I18n::tr('link.delete') . '</a></td>';
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
</div>
</div>
<div class="row">
<div class="twelve columns">
	<table class="stripe">
	<?php
	  if (!sizeof($data['activities'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.activities') . '</th><th colspan="3">&nbsp;</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['activities'] as $activity) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($activity["categoryname"]) . '/' . htmlspecialchars($activity["name"]) . '</td>';
			echo '<td>' . htmlspecialchars($activity["description"]) . '</td>';
			echo '<td><a href="' . DIR . 'activities/del/' . htmlspecialchars($activity["id"]) . '">' . UiHelper::deleteIcon() . '</a></td>';
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
</div>
</div>

<div class="row">
	<div class="twelve columns">
	<table class="stripe">
	<?php

	  if (!sizeof($data['resources'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.resources') . '</th><th colspan="3">&nbsp;</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['resources'] as $item) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($item["name"]) . '</td>';
			echo '<td>' . htmlspecialchars($item["description"]) . '</td>';
			echo '<td><a href="' . DIR . 'resources/del/' . htmlspecialchars($item["id"]) . '">' . UiHelper::deleteIcon() . '</a></td>';
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
	</div>
</div>
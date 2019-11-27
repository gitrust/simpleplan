
<div class="row">
	<div class="twelve columns">
	<table class="stripe">
	<?php

	  if (!sizeof($data['resources'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.resource') . '</th>';

		 if ( !Session::get('ismobileversion')) {
		 	echo '<th>' . I18n::tr('table.header.inuse') . '</th>';
		 }

		 echo '<th colspan="2">' . I18n::tr('table.header.description') . '</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['resources'] as $item) {
			$isusedflag = ($item["usagecount"] > 0) ? 'x' : '&nbsp;';

			echo '<tr>';
			echo '<td>' . htmlspecialchars($item["name"]) . '</td>';
			if ( !Session::get('ismobileversion')) {
				echo '<td>' . $isusedflag . '</td>';
			}
			echo '<td>' . htmlspecialchars($item["description"]) . '</td>';
			if ($data['isadmin']) {
				echo '<td><a href="' . DIR . 'resources/del/' . htmlspecialchars($item["id"]) . '">' . UiHelper::deleteIcon() . '</a></td>';
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
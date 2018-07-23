<div class="row">
	<div class="twelve columns">
	<table class="stripe">
	<?php
	  if (!sizeof($data['users'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.users') . '</th><th colspan="3">&nbsp;</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['users'] as $item) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($item["login"]) . '</td>';
			echo '<td>' . htmlspecialchars($item["firstname"]) . '</td>';
			echo '<td><a href="' . DIR . 'admin/userdel/' . htmlspecialchars($item["id"]) . '">' . I18n::tr('link.delete') . '</a></td>';
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
	</div>
</div>
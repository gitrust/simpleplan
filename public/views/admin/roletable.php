<div class="row">
<div class="twelve columns">
	<table class="stripe">
	<?php
	  if (!sizeof($data['roles'])) {
		 echo '<div class="alert alert-info">Keine Rollen</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.roles') . '</th><th colspan="3">&nbsp;</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['roles'] as $role) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($role["role"]) . '</td>';
			echo '<td>' . htmlspecialchars($role["description"]) . '</td>';
			echo '<td><a href="' . DIR . 'admin/roledel/' . htmlspecialchars($role["id"]) . '">' . I18n::tr('link.delete') . '</a></td>';
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
</div>
</div>
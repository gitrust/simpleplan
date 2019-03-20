<div class="row">
	<div class="twelve columns">
	<table class="stripe">
	<?php
	  if (!sizeof($data['users'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.users') . '</th>';
         echo '<th>' . I18n::tr('table.header.firstname') . '</th>';
         echo '<th>' . I18n::tr('table.header.email') . '</th>';
         echo '<th>' . I18n::tr('table.header.systemrole') . '</th>';
         echo '<th>&nbsp;</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['users'] as $item) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($item["login"]) . '</td>';
			echo '<td>' . htmlspecialchars($item["firstname"]) . '</td>';
            echo '<td>' . htmlspecialchars($item["email"]) . '</td>';
            echo '<td>' . htmlspecialchars($item["userRole"]) . '</td>';
			echo '<td><a href="' . DIR . 'users/del/' . htmlspecialchars($item["id"]) . '">' . UiHelper::deleteIcon() . '</a></td>';
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
	</div>
</div>
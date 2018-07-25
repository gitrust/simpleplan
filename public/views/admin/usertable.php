<div class="row">
	<div class="twelve columns">
    <div class="hscroller">
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
         echo '<th>' . I18n::tr('table.header.admin') . '</th>';
         echo '<th>&nbsp;</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['users'] as $item) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($item["login"]) . '</td>';
			echo '<td>' . htmlspecialchars($item["firstname"]) . '</td>';
            echo '<td>' . htmlspecialchars($item["email"]) . '</td>';
            echo '<td>' . htmlspecialchars($item["roleflag"] == 'A' ? 'Yes' : 'No') . '</td>';
			echo '<td><a href="' . DIR . 'admin/userdel/' . htmlspecialchars($item["id"]) . '">' . I18n::tr('link.delete') . '</a></td>';
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
    </div>
	</div>
</div>
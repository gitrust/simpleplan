
<div class="row">
<div class="twelve columns">

	<h1><?= $data['title'] ?></h1>

	<!-- menu -->
	<div class="subnav">
		<a href="<?= DIR ?>events/mylist/"><?= I18n::tr('link.mylist'); ?></a>
		| <a href="<?= DIR ?>events/teamlist/"><?= I18n::tr('link.teamlist'); ?></a> 
	</div>

	<?php echo Message::show(); ?>	
	<div>
	&nbsp;
	</div>

    <div class="hscroller">
	<table class="stripe">
	<?php
	  if (!sizeof($data['roles'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr><th>' . I18n::tr('table.header.entrylist') . '</th>';
		 foreach ($data['roles'] as $role) {
			$title = htmlspecialchars($role["description"]);
			$role  = htmlspecialchars($role["role"]);
			echo '<th title="' . $title . '">' . $role . '</th>';
		 }
		 echo '</tr></thead>';
		 
		 echo '<tbody>';
		
		 foreach ($data['schedules'] as $schedule) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($schedule["targetDate"]) . '</td>';
			
			foreach ($data['roles'] as $role) {
				$key = $schedule["id"] . "-" . $role["id"];
				$uarray = $data["entryUsers"][$key];
				$value = "";
				if (count($uarray) > 0) {
					$value = implode(', ',$uarray);
				}			
				echo '<td>' . htmlspecialchars($value) . '</td>';
			}
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
    </div>
</div>
</div> <!-- / .row -->
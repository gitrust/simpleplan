<div class="row">
<div class="twelve columns">

	<h1><?= $data['title'] ?></h1>
	
	<!-- menu -->
	<!--div class="subnav">
		<a href="<?= DIR ?>schedules/view/"><?= I18n::tr('link.schedules.readonly'); ?></a>
		| <a href="<?= DIR ?>schedules/print/"><?= I18n::tr('link.schedules.print'); ?></a>
	</div-->

	<?php echo Message::show(); ?>


	<!-- Table -->
	<table id="activityresources" class="stripe">
	<?php
	  if (!sizeof($data['events'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		echo '<thead><tr>';
		echo '<th>Datum</th>';
		echo '<th>BEschreibung</th>';
		echo '<th>Ressource</th>';
		echo '</tr></thead>';
		echo '<tbody>';
		foreach ($data['events'] as $item) {
			echo '<tr><td>';
			echo  htmlspecialchars($item['targetDate']) ;
			echo '</td>';
			echo '<td>';
			echo '<br><div class="caption-small">' . htmlspecialchars($item['description']) . '</div>';
			echo '</td>';
			echo '<td>Anika</td>';
			echo '</tr>';
		}		
		echo '</tbody>';
	  }
	?>
	</table>
</div>
</div> <!-- / .row -->

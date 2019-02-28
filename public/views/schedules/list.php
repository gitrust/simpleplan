

<div class="row">
<div class="twelve columns">

	<h1><?= $data['title'] ?></h1>

<?php
	if ($data["isadmin"]) {
		// require("nav.php");
	}
	echo "<br>";
?>
	
	<?php echo Message::show(); ?>

	<table class="stripe">
	<?php
	  if (!sizeof($data['events'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		echo '<thead><tr><th>&nbsp;</th>';
		foreach ($data['events'] as $item) { 
			echo '<th>';
			echo '' . $item['targetDate'] . '';
			echo '</th>';
		}

		echo '</tr></thead>';
		echo '<tbody>';
		foreach ($data['activities'] as $item) {
				echo '<tr>';
				echo '<td>[' . htmlspecialchars($item["categoryname"])  . '] ' . htmlspecialchars($item["name"]) . '</td>';
				foreach ($data['events'] as $item) { 
					echo '<td>';
					echo '<a href="" title="Resource planen">+R</a>';
					echo '</td>';
				}
				echo '</tr>';
		}
		echo '</tbody>';
	  }
	?>
	</table>
</div>
</div> <!-- / .row -->
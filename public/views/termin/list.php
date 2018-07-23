<script language="JavaScript">
	function resetAll() {
		checkboxes = document.getElementsByName('entrykeys[]');
		for(var i in checkboxes){
			checkboxes[i].checked = false;			
		}
	}
</script>

<div class="row">
<div class="twelve columns">

	<h1><?= $data['title'] ?></h1>

<?php
	if ($data["isadmin"]) {
		require("nav.php");
	}
	echo "<br>";
?>
	
	<?php echo Message::show(); ?>

	<form action="<?= DIR ?>termin/update/" method="POST">
	
<?php
  if (sizeof($data['roles'])) {
	echo '<div>';
	echo '<input class="button-primary" value="' . I18n::tr('button.save') . '" type="submit">&nbsp;';
	echo '</div>';
  }
?>

	<table class="stripe">
	<?php
	  if (!sizeof($data['roles'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr><th>' . I18n::tr('table.header.entrylist') . '</th>';
		 foreach ($data['roles'] as $role) {
			echo '<th>' . htmlspecialchars($role["role"]) . '</th>';
		 }
		 echo '</tr></thead>';
		 
		 echo '<tbody>';
		
		 foreach ($data['schedules'] as $schedule) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($schedule["targetDate"]) . '</td>';
			
			foreach ($data['roles'] as $role) {
				$key = $schedule["id"] . "-" . $role["id"];
				$checked = "";
				
				if (in_array($key,$data["entrykeys"])) {
					$checked = "checked";
				}
				echo '<td><input type="checkbox" name="entrykeys[]" ' . $checked . ' value="' . $key . '"></td>';
			}
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
	</form>
</div>
</div> <!-- / .row -->
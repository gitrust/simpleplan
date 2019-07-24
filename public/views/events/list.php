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

	<h2><?= $data['title'] ?></h2>

<?php
	if ($data["isadmin"]) {
		require("nav.php");
	}
	echo "<br>";
?>
	
	<?php echo Message::show(); ?>

	<form action="<?= DIR ?>events/update/" method="POST">
	
<?php
  if (sizeof($data['roles'])) {
	echo '<div>';
	echo '<input class="button-primary" value="' . I18n::tr('button.save') . '" type="submit">&nbsp;';
	echo '</div>';
  }
?>

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
			echo '<td>' . htmlspecialchars(UiHelper::formatDate($schedule["targetDate"])) . '</td>';
			
			foreach ($data['roles'] as $role) {
				$key = $schedule["id"] . "-" . $role["id"];
				$checked = "";
				
				if (in_array($key,$data["entrykeys"])) {
					$checked = "checked";
				}
				echo '<td><input type="checkbox" name="entrykeys[]" ' . $checked . ' value="' . htmlspecialchars($key) . '"></td>';
			}
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
    </div>
	</form>
</div>
</div> <!-- / .row -->
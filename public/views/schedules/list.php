

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
	  if (!sizeof($data['schedules'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo 'Hello'
	  }
	?>
	</table>
</div>
</div> <!-- / .row -->
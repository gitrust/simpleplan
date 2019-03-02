
<!-- modal div to choose a resource -->
<div id="moddiv" class="modal">
<form id="scheduleform" method="POST" action="<?= DIR ?>schedules/add">
    <input type="hidden" id="event" name="event" value="">
	<input type="hidden" id="activity" name="activity" value="">
	<select id="select-resource" autofocus name="resource" required>
<?php
foreach ($data['resources'] as $item) {
	echo '<option value="' . htmlspecialchars($item['id']) . '">' . htmlspecialchars($item["name"]) . '</option>';
}
?>
	</select>
	<br>
	<input class="button-primary" type="submit" value="Add">
	<input class="button-primary" type="submit" value="Delete">
	</form>
</div>



<div class="row">
<div class="twelve columns">

	<h1><?= $data['title'] ?></h1>
	
	<?php echo Message::show(); ?>

	<table id="schedules" class="stripe">
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
		
		$table = $data['tabledata'];
		for ($i = 0; $i < count($table); $i++) {
				$row = $table[$i];

				echo '<tr>';

				// first column is name of activity
				echo '<td>';
				echo htmlspecialchars($row[0]["activityname"]);
				echo '</td>';

				for ($j = 0; $j < count($row); $j++) {
					$col = $row[$j];
					echo '<td>';

					// jquery modal plugin
					$link = '<a ';
					$link .= 'id="reslink" ';
					$link .= 'href="#" ';
					$link .= 'data-ref="' . $col["eventid"] . ',' . $col["activityid"] . '" ' ;
					$link .= 'title="Add Resource" ';
					$link .= '>';
					$link .= 'add';
					$link .= '</a>';
					echo $link;

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

<script>

$('#select-resource').selectize();

function popupWindow(event, activity) {
	$("#event").val(event);
	$('#activity').val(activity);
	$('#moddiv').modal('show');
	//$('#scheduleform').submit();
}

// register a click handler for a with id=reslink
$('[id^=reslink]').click(function(){
	  // set values from link and popup modal window
	var data = $(this).data("ref");
	var eId = data.slice(0,data.indexOf(','));
	var aId = data.slice(data.indexOf(',')+1,data.length);
	popupWindow(eId,aId); 
	return false; 
});


</script>
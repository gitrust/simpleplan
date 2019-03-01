
<!-- modal div to choose a resource -->
<div id="moddiv" class="modal">
<form id="scheduleform" method="POST" action="<?= DIR ?>schedules/add">
  <input type="hidden" id="event">
	<input type="hidden" id="activity">
	<select id="select-resource" autofocus name="resource" required>
<?php
  foreach ($data['resources'] as $item) {
	echo '<option value="' . $item['id'] . '">' . htmlspecialchars($item["name"]) . '</option>';
	}
?>
	</select>
	<br>
	<input type="submit" value="Add">
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
		$i = 0;
		foreach ($data['activities'] as $item) {
				echo '<tr>';
				echo '<td>[' . htmlspecialchars($item["categoryname"])  . '] ' . htmlspecialchars($item["name"]) . '</td>';
				foreach ($data['events'] as $item) {
					echo '<td>';
					// jquery modal plugin
					echo '<a id=\'reslink'.$i.'\' href=\'#\' data-ref=\'222,333\' title=\'Resource planen\'>+R</a>';
					echo '</td>';
					$i = $i + 1;
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
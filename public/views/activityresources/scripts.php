
<script>

var $selectresource = $('#select-resource').selectize();

function popupWindow(event, activity) {
	// set event and activity ids
	$("#event").val(event);
	$('#activity').val(activity);

	// set default value
	// $selectresource[0].selectize.setValue("1");

	$selectresource[0].selectize.focus();

	$('#moddiv').modal('show');
	//$('#scheduleform').submit();
}

// register a click handler for a with id=reslink
$('[id^=reslink]').click(function(){
	  // set values from link and popup modal window
	var data = $(this).data("ref");
	var eId = data.slice(0,data.indexOf(','));
	var aId = data.slice(data.indexOf(',') + 1,data.length);
	popupWindow(eId,aId); 
	return false; 
});


</script>
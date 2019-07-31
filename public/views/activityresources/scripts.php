
<script>

var $selectresource = $('#select-resource').selectize();

function popupWindow(event) {
	// set event id
	$("#event").val(event);

	// set default value
	// $selectresource[0].selectize.setValue("1");

	$selectresource[0].selectize.focus();

	$('#moddiv').modal('show');
}

// register a click handler for a with id=reslink
$('[id^=reslink]').click(function(){
	// set values from link and popup modal window
	var data = $(this).data("ref");
	var eId = data;

	popupWindow(eId); 
	return false; 
});


</script>
$(document).ready(function() {
	
	// Ensure only one checkbox is selected.
	$("input:checkbox").change(function() {
		$("input:checkbox").not(this).prop("checked", false);
	});
	
	// Ensure that at least one movie or theater is selected.
	$("#filterCriteria").bind('onclick', checkInputFields);

	// 
	
});

function checkInputFields() {
	if ($("#theaterList").attr("value", "All venues") 
		&& $("#movieList").attr("value", "All films")) {
		document.getElementById("empty_form_error").setCustomValidity("Select either a movie or a theater");
		console.log("Hi there");
		return false;
	} else {
		document.getElementById("empty_form_error").setCustomValidity("");
		console.log("Hi Byes");
		return true;
	}
};
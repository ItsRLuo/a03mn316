$(document).ready(function() {
	document.getElementById("filterCriteria").oninput = function() {
		if ($("#theaterList").val() == "" && $("#movieList").val() == "") {
			document.getElementById("theaterList").setCustomValidity("Select either a movie or a theater");
			document.getElementById("movieList").setCustomValidity("Select either a movie or a theater");
			return false;
		} else {
			document.getElementById("theaterList").setCustomValidity("");
			document.getElementById("movieList").setCustomValidity("");
			return true;
		}
	};
	
});
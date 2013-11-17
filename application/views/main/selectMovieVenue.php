<?php

	echo "<h1>Venue and Movie Selection</h1>";
	echo form_open("main/validate");
	
	// Select a time.
	echo form_label("Select a date: \n");	

	echo form_dropdown("Days", $dateArray, set_value("Days"));
	
	echo "<br/><br/>"; 
	
	// Select a venue.
	
	// Indicate if neither a movie NOR a theater was selected.
	echo form_error("Movies", "<p id='empty_form_error'>", "</p>");
	echo form_label("Select a venue AND/OR movie: \n");

	echo form_dropdown("Theaters", $theater_names, set_value("Theaters"), array("id" => "theaterList"));
	echo "<br></br>";

	echo form_dropdown("Movies", $movie_names, set_value("Movies"), array("id" => "movieList"));	
	echo "<br></br>";
	
	// Find a movie!
	echo form_submit(array("name" => 'Search for movie', "value" => 'Search for movie', 
								'id' => 'filterCriteria'));
	
	echo form_close();
	

?>

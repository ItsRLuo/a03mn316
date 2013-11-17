
<?php

	echo form_open("main/selectSeat");
 	echo $movieInfoStr;

	
	$numEntries = 0;
	$g = $viewings->result();
	
	$ticketInfo = getTicketInfo($g[0]);
	echo form_checkbox(array("name" => "checkMe", "class" => "ticketSelect checkbox",
			"value" => $numEntries, "checked" => true));
	echo $ticketInfo . "<br/>";
	$numEntries += 1;
	
	foreach (array_slice($g, 1) as $viewing) {
		$ticketInfo = getTicketInfo($viewing);
		echo form_checkbox(array("name" => "checkMe", "class" => "ticketSelect checkbox", 
								  "value" => $numEntries));
		echo $ticketInfo . "<br/>";
		$numEntries += 1;
	}

	echo $numEntries . " entries in total<br/>";

	echo "<br/>";
	echo form_submit('Select', 'Select');

	function getTicketInfo($viewing) {
		$view_string = "%s at %s (%s), on %s, at %s, %s seats available";
		return sprintf($view_string, $viewing->title, $viewing->name, $viewing->address,
				$viewing->date, $viewing->time, $viewing->available) . "<br/>";
	}
	
?>
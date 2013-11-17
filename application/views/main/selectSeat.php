<?php
	echo "<link rel='stylesheet' type='text/css' href='" . base_url() . "css/graphicSeatSelection.css'>";
	echo "<script src=" . base_url() . "scripts/graphicSeatSelection.js></script>";
	
	echo form_open("main/userInformation");
	
	echo "<div class='theaterContainer'>";
		echo "<div class='seat leftSeat'></div>";
		echo "<div class='seat rightSeat rs2'></div>";
		echo "<div class='seat rightSeat rs1'></div>";	
	echo "</div><br/>";
	
	echo form_submit("Select seat", "Select seat");
	echo form_close();
	echo "<p class='seatsLeftError'></p>";

	echo $x->title . "<br/>";
	echo $x->name . "<br/>";
	echo $x->address . "<br/>";
	echo $x->date . "<br/>";
	echo $x->time . "<br/>";
	echo $x->available . "<br/>";
	
?>
<script>
$(document).ready(function() {
	var x = parseInt("<?= $x->available ?>");
	
	$(".leftSeat").addClass("selected");
	
	if (x == 1) {
		$(".rs2").addClass("occupied");
		$(".rs1").addClass("occupied");
	}
	
	if (x == 2) {
		$(".rs2").addClass("occupied");
		$(".rs1").addClass("vacant");
	}
	
	if (x == 3) {
		$(".rs2").addClass("vacant");
		$(".rs1").addClass("vacant");
	}

	$(".seat").bind("click", function() {
		if ($(this).hasClass("vacant")) {
			$(".selected").addClass("vacant");
			$(".selected").removeClass("selected");
			$(this).addClass("selected");
			$(this).removeClass("vacant");
		}
	});
	
	
	
});
</script>
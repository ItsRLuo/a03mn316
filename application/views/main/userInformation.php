<div id="information">
<?php
	$this->load->helper("form");
	echo validation_errors();
	echo "<h1>Payment</h1>";
	echo form_open("main/overview");
	$date = 0;
	echo form_label("firstname","firstname");
	$data = array(
			"name" => "firstname",
			"id"   => "firstname",
			"value" => "");
	echo form_input($data);
	echo form_label("lastname","lastname");
	$data = array(
			"name" => "lastname",
			"id"   => "lastname",
			"value" => ""
			);
	echo form_input($data);
	
	echo form_label("credit (Must be all numbers and 16 characters long)","credit");
	$data = array(
			"name" => "credit",
			"id"   => "credit",
			"value" => ""
	);
	echo form_input($data);
	
	echo form_label("year (The last two digit of the year, Example YY)","year");
	$data = array(
			"name" => "year",
			"id"   => "year",
			"value" => "",
			'style' => "width:5%",
			'maxlength' =>  "2"
	);
	echo form_input($data);
	
	echo form_label("month (only two character long, Example MM)","month");
	$data = array(
			"name" => "month",
			"id"   => "month",
			"value" => "",
            'style'       => 'width:5%',
			'maxlength' =>  "2"
	);
	echo form_input($data);
	echo form_submit('submit', 'submit');
	echo form_close();
?>
</div>
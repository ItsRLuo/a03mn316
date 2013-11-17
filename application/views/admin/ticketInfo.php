<?php
echo anchor('','Back') . "<br />";

echo "<h1>Ticket Info</h1>";
	

if (!empty($ticketList)) {
	echo $this->table->generate($ticketList);
}
?>

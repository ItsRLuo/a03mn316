<?php
class Ticket_model extends CI_Model {

	function get_tickets()
	{
		$query = $this->db->query("select * from ticket");
		return $query;
	}

	function get_tickets_by_id($id) {
		$query = $this->db->query("select t.seat from ticket t where t.showtime_id = " . $id);
		echo "<br/><br/>";
		echo "foo";
		$ticketsRemaining = array(1, 2, 3);
		foreach ($query->result() as $ticket) {
			array_diff($ticketsRemaining, array($ticket->seat));
		}

		return $ticketsRemaining;
	}

	function populate($n) {

		$ticketID = 1;
		
		// Credit card month and year
		$months = range(1, 12);
		foreach ($months as $month) {
			$month = sprintf("%02d", $month);
			echo $month;
		}
		$currYear = intval(idate("y"));
		$years = array();
		for ($i = 0; $i < 50; $i++) {
			$years[$i] = $currYear + $i;
			echo $years[$i] . ", ";
		}
		
		$this->load->model('showtime_model');
		$sids = $this->showtime_model->get_showtime_ids();
		
		$lastNames = explode("\n				", "Abraham
				Allan
				Alsop
				Anderson
				Arnold
				Avery
				Bailey
				Baker
				Ball
				Bell
				Berry
				Black
				Blake
				Bond
				Bower
				Brown
				Buckland
				Burgess
				Butler
				Cameron
				Campbell
				Carr
				Chapman
				Churchill
				Clark
				Clarkson
				Coleman
				Cornish
				Davidson
				Davies
				Dickens
				Dowd
				Duncan
				Dyer
				Edmunds
				Ellison
				Ferguson
				Fisher
				Forsyth
				Fraser
				Gibson
				Gill
				Glover
				Graham
				Grant
				Gray
				Greene
				Hamilton
				Hardacre
				Harris
				Hart
				Hemmings
				Henderson
				Hill
				Hodges
				Howard
				Hudson
				Hughes
				Hunter
				Ince
				Jackson
				James
				Johnston
				Jones
				Kelly
				Kerr
				King
				Knox
				Lambert
				Langdon
				Lawrence
				Lee
				Lewis
				Lyman
				MacDonald
				Mackay
				Mackenzie
				MacLeod
				Manning
				Marshall
				Martin
				Mathis
				May
				McDonald
				McLean
				McGrath
				Metcalfe
				Miller
				Mills
				Mitchell
				Morgan
				Morrison
				Murray
				Nash
				Newman
				Nolan
				North
				Ogden
				Oliver
				Paige
				Parr
				Parsons
				Paterson
				Payne
				Peake
				Peters
				Piper
				Poole
				Powell
				Pullman
				Quinn
				Rampling
				Randall
				Rees
				Reid
				Roberts
				Robertson
				Ross
				Russell
				Rutherford
				Sanderson
				Scott
				Sharp
				Short
				Simpson
				Skinner
				Slater
				Smith
				Springer
				Stewart
				Sutherland
				Taylor
				Terry
				Thomson
				Tucker
				Turner
				Underwood
				Vance
				Vaughan
				Walker
				Wallace
				Walsh
				Watson
				Welch
				White
				Wilkins
				Wilson
				Wright
				Young");
		
		foreach ($lastNames as $lastName) {
			echo $lastName . " ";
		}
		
		$firstNames = explode("\n				", "Emerita
				Marci
				Shay
				Holly
				Letty
				Alia
				Raisa
				Harriet
				Roy
				Jeneva
				Krissy
				Steffanie
				Yolande
				German
				Candi
				Juana
				Arnetta
				Tricia
				Galina
				Kylie
				Linwood
				Rosetta
				Raven
				Valery
				Ai
				Shantelle
				See
				Cristina
				Booker
				Kortney
				Orlando
				Lavera
				Jolynn
				Mervin
				Mayra
				Ariane
				Sherryl
				Gertrude
				Tyron
				Dante
				Emmie
				Rea
				Germaine
				Seth
				Sona
				Lindsy
				Chelsie
				Galen
				Shila
				Coletta
				Venetta
				Moira
				Chad
				Dione
				Thaddeus
				Maria
				Lilia
				Laurie
				Duncan
				Herta
				Lekisha
				Hassie
				Maragret
				Shawnna
				Delmy
				Rochel
				Hayley
				Jasper
				Mariano
				Gilberto
				Daysi
				Serina
				Marilou
				Sirena
				Eugenie
				Eve
				Markus
				Virgina
				Kasey
				Gilda
				Jaqueline
				Treena
				Edison
				Cherie
				Donette
				Jefferey
				Jeffie
				Charlette
				Scarlett
				Stacia
				Catarina
				Catheryn
				Jeannine
				Laverna
				Shiloh
				Carisa
				Bunny
				Dannielle
				Edelmira
				Marylynn");
		
		echo "<br/>";
		
		foreach ($firstNames as $firstName) {
			echo $firstName . " ";
		}
		
		echo "<br/>";
		echo "Data: ";
		
		for ($i = 0; $i < 1000; $i++) {
			$randFN = $firstNames[array_rand($firstNames)];
			$randLN = $lastNames[array_rand($lastNames)];
			$seat = rand(1, 3);
			$credNum = rand(1000000000000000, 9999999999999999);
			
			$creditCardexp = sprintf("%04d", $months[array_rand($months)] . $years[array_rand($years)]);
			$showID = $sids[array_rand($sids)];
			
			echo $ticketID . " ";
			echo $randFN . " ";
			echo $randLN . " ";
			echo $credNum . " ";
			echo $creditCardexp . " ";
			echo $showID . " ";
			echo $seat . "<br/>";
			
			$str = "insert into g2chenri.ticket (ticket, first, last, creditcardnumber, creditcardexpiration, showtime_id, seat)
			values ($ticketID, '$randFN', '$randLN', '$credNum', '$creditCardexp', $showID, " . rand(1, 3) . ')';
			$this->db->query($str);
			echo $str . "<br/>";
			
			$ticketID++;
		}
		
	}

	function delete() {
		$this->db->query("delete from ticket");
	}


	function get_theater_names() {

	}

}
?>
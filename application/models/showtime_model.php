<?php
class Showtime_model extends CI_Model {

	function get_showtimes()
	{
		$query = $this->db->query("select m.title, t.name, t.address, s.date, s.time, s.available
								from movie m, theater t, showtime s
								where m.id = s.movie_id and t.id=s.theater_id");
		return $query;	
	}  

	function populate() {
		
		$movies = $this->movie_model->get_movies();
		$theaters = $this->theater_model->get_theaters();
		
		//If it returns some results we continue
		if ($movies->num_rows() > 0 && $theaters->num_rows > 0){
			foreach ($movies->result() as $movie){
				foreach ($theaters->result() as $theater){
					for ($i=1; $i < 15; $i++) {
						for ($j=20; $j <= 22; $j+=2) {
							$this->db->query("insert into showtime (movie_id,theater_id,date,time,available)
									values ($movie->id,$theater->id,adddate(current_date(), interval $i day),'$j:00',3)");
								
						}
					}		
				}				
			}
		}		
	}

	function delete() {
		$this->db->query("delete from showtime");
	}

	function get_specific_showtimes($movie, $theater, $date)
	{
		$date = date("Y-m-d", strtotime($date));
// 		/echo $date;
		
		$qstring = "select m.title, t.name, t.address, s.date, s.time, s.available
								from movie m, theater t, showtime s
								where m.id = s.movie_id and t.id = s.theater_id and s.available > 0";
		$adjusted_qstring = "select m.title, t.name, t.address, s.date, s.time, s.available
								from g2chenri.movie m, g2chenri.theater t, g2chenri.showtime s
								where m.id = s.movie_id and t.id = s.theater_id and s.available > 0";
		
		if ($theater != "") {
			$qstring .= " and t.name = \"$theater\"";
			$adjusted_qstring .= " and t.name = \"$theater\"";
		}
		if ($movie != "") {
			$qstring .= " and m.title = \"$movie\"";
			$adjusted_qstring .= " and m.title = \"$movie\"";
		}
		if ($date != "") {
			$qstring .= " and s.date = '$date'";
			$adjusted_qstring .= " and s.date = '$date'";
		}
		$qstring .= ";";
		
		echo "Query was: " . $adjusted_qstring . ";";
	
		$query = $this->db->query($qstring);
		
		return $query;
	}
	
	
}
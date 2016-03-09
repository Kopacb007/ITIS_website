<?php 
	
	function data_page ($dbc, $id) {
		
		$q = "SELECT * FROM pages WHERE id = $id";
		$r = mysqli_query($dbc, $q);

		$data = mysqli_fetch_assoc($r); 
		//mysqli_fetch_assoc() means => arr['name'] not the arr[0]

		return $data;
	}

	function data_news ($dbc) {

		$q = "SELECT * FROM news";
		$r = mysqli_query($dbc, $q);

		return $r;
	}

	function data_circolari ($dbc) {

		$q = "SELECT * FROM circolari";
		$r = mysqli_query($dbc, $q);

		return $r;
	}

	function data_indirizzi ($dbc) {

		$q = "SELECT * FROM indirizzi";
		$r = mysqli_query($dbc, $q);

		return $r;
	}

 ?>
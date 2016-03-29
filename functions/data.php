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

	function data_user ($dbc, $id) {

		if (is_numeric($id)) {
			$cond = "WHERE id = '$id'";
		} else {
			$cond = "WHERE first = '$id'";
		}

		$q = "SELECT * FROM users $cond";
		
		$r = mysqli_query($dbc, $q);

		$data = mysqli_fetch_assoc($r);

		$data['fullname'] = $data['first'] . ' ' . $data['last'];

		$data['fullname_reverse'] = $data['last'] . ' ' . $data['first'];
		$data['img_source'] = 'src="'.$data['avatar'].'"';

		return $data;
	}

	/**
	 * Get the customer's IP address.
	 *
	 * @return string
	 */
	function getIpAddress() {
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        return $_SERVER['HTTP_CLIENT_IP'];
	    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
	        return trim($ips[count($ips) - 1]);
	    } else {
	        return $_SERVER['REMOTE_ADDR'];
	    }
	}

	function get_page ($dbc, $id, $type) {

		$q = "SELECT * FROM $type WHERE id = $id";
		$r = mysqli_query($dbc, $q);

		$data = mysqli_fetch_assoc($r); 
		//mysqli_fetch_assoc() means => arr['name'] not the arr[0]

		return $data;
	}

	function get_users ($dbc) {
		$q = "SELECT * FROM users";
		$r = mysqli_query($dbc, $q);

		return $r;
	}

	function get_materie ($dbc) {
		$q = "SELECT * FROM materie";
		$r = mysqli_query($dbc, $q);

		return $r;
	}
    
    function get_users_classe ($dbc, $id) {
		$q = "SELECT 
        classi.id, 
        classi.numero, 
        classi.lettera,
        classi.indirizzo_id 
        FROM classi
        INNER JOIN users ON classi.id = users.classe_id
        WHERE users.id = $id";
		$r = mysqli_query($dbc, $q);

		return $r;
	}
 ?>
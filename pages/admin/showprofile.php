<?php
include('../../config/connection.php');
include('../../functions/data.php');

if (isset($_POST['user_id'])) {
    
    $user = data_user($dbc, $_POST['user_id']);
    include('template/editprofile.php');
}

if (isset($_POST['save'])) {
    
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$telefono = $_POST['telefono'];
	$cellulare = $_POST['cellulare'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$q = "UPDATE `users` 
	SET `first` = '$nome',
	 `last` = '$cognome',
	  `telefono` = '$telefono',
	   `cellulare` = '$cellulare',
	    `email` = '$email' 
	    WHERE `users`.`id` = $_POST[userid]";

	if (!empty($_POST['password']) and !empty($_POST['newpass']) and !empty($_POST['repass'])) {
		$newpass = $_POST['newpass'];
		$repass = $_POST['repass'];

		if ((SHA1($_POST['password']) === SHA1($password)) and ($newpass === $repass)) {
			$encodedpass = SHA1($newpass);
			$q = "UPDATE `users` 
			SET `first` = '$nome',
			 `last` = '$cognome',
			  `telefono` = '$telefono',
			   `cellulare` = '$cellulare',
			    `email` = '$email',
			     `password` = '$encodedpass' 
			     WHERE `users`.`id` = $_POST[userid]";
		}
	}

	$r = mysqli_query($dbc,$q);
	$message = "The profile has been updated";
}

if (isset($message)) {
    include('popup.php');
}
?>
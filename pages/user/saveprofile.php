<?php
#Start the session:
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

#Checking the session
if ((!isset($_SESSION['userid'])) || ($_SESSION['type'] !== 'student')) 
{
    header('Location: ../login/index.php');
}

include('config/setup.php');

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
	    WHERE `users`.`id` = $user[id]";

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
			     WHERE `users`.`id` = $user[id]";
		}
	}

	$r = mysqli_query($dbc,$q);
	$message = "The profile has been updated";
}

if (isset($message)) {
    include('popup.php');
}
?>
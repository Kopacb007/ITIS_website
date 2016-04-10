<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('../../config/connection.php');

$date = (string)$_SESSION['current_date']['year']."-".(string)$_SESSION['current_date']['mon']."-".(string)$_SESSION['current_date']['mday'];
$time = (string)$_SESSION['current_date']['hours'].":".(string)$_SESSION['current_date']['minutes'].":".(string)$_SESSION['current_date']['seconds'];
$datetime = "$date "."$time";

$q = "UPDATE `users` 
SET `last_session` = '$datetime',
`last_ip` = '$_SESSION[current_ip]' 
WHERE `users`.`id` = $_SESSION[userid]";
$r = mysqli_query($dbc, $q) or die(mysql_error());

unset($_SESSION['userid']); // In order to kill the session altogether, like to log the user out, the session id must also be unset.

//session_destroy(); //This would delete all of the session keys

header('Location: index.php'); // Redirect to main page

 ?>
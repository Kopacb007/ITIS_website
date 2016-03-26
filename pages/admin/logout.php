<?php 

#Start session:
session_start();

unset($_SESSION['userid']); // Delete the user key

// session_destroy(); //This would delete all of the session keys

header('Location: index.php'); // Redirect to main page

 ?>
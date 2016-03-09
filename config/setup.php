<?php 

# Database connection:
$dbc = mysqli_connect('localhost', 'test', 'password1', 'test') OR die('Could not connect because: ' . mysqli_connect_error());

#Constants:
DEFINE('D_TEMPLATE', 'template');

#Functions:
include '/functions/data.php';

// It shows up in the browser's page tab
$site_title = 'ITTS "O. Belluzzi - L. da Vinci"'; 

if (isset($_GET['page'])) {
	$pageid = $_GET['page']; // Set with URL value
} else {
	$pageid = 1; //Set with 1 to reffer the Home default page
}

#Page variable setup:
$page = data_page($dbc, $pageid);

#News card array setup:
$news = data_news($dbc);

#Circolari card array setup:
$circolari = data_circolari($dbc);

#Indirizzi array setup:
$indirizzi = data_indirizzi($dbc);

 ?>
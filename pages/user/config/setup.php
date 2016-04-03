<?php 

#Database connection:
include('../../config/connection.php');

#Constants:
DEFINE('D_TEMPLATE', 'template');

#Functions:
include '../../functions/data.php';

// It shows up in the browser's page tab
$site_title = 'ITTS "O. Belluzzi - L. da Vinci"'; 

if (isset($_GET['page'])) {
	$pageid = $_GET['page']; // Set with URL value
} else {
	$pageid = 1; //Set with 1 to reffer the Home default page
}

#Page variable setup:
$page = data_page($dbc, $pageid);

#User setup:
$user = data_user($dbc, $_SESSION['userid']);
$user['ip'] = getIpAddress();

 ?>
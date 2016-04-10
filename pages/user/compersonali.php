<?php 

if (isset($user['id'])) {

	$user_id = $user['id'];
    
    $cond = "WHERE users.id = $user_id ORDER BY compersonali.data DESC";

	$q = "SELECT
        compersonali.data AS Data, 
        compersonali.comunicazione AS Comunicazione, 
        compersonali.allegati AS Allegati
        FROM compersonali 
        INNER JOIN users ON users.id = compersonali.user_id
        $cond";
	$r = mysqli_query($dbc, $q) or die(mysql_error());

}


?>
<div class="row">
    <?php 
	if (isset($r)) {
		include('showtable.php');
	}
    ?>
</div>



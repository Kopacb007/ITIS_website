<?php 

if (isset($user['id'])) {

	$user_id = $user['id'];
    
    $cond = "WHERE users.id = $user_id ORDER BY permessi.da_data DESC";

	$q = "SELECT
        permessi.da_data AS 'Da Data', 
        permessi.a_data AS 'A Data', 
        permessi.tipo_permesso AS Tipo,
        permessi.ora AS Ora,
        permessi.giorni AS Giorni
        FROM permessi 
        INNER JOIN tipo_permesso ON tipo_permesso.id = permessi.tipo_permesso
        INNER JOIN users ON users.id = permessi.user_id
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



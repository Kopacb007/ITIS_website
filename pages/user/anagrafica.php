<?php 

if (isset($user['id'])) {

	$user_id = $user['id'];
    
    $cond = "WHERE users.id = $user_id";

	$q = "SELECT
        users.id AS 'Codice studente',
        users.first AS Nome,
        users.last AS Cognome,
        CONCAT(classi.numero, ' ', classi.lettera) AS Classe,
        users.cod_fiscale AS 'Codice fiscale',
        users.telefono AS Telefono,
        users.cellulare AS Cellulare,
        users.email AS Email
        FROM users
        INNER JOIN classi ON classi.id = users.classe_id
        $cond";
	$r = mysqli_query($dbc, $q) or die(mysql_error());

}


?>
<div class="row">
    
    <?php 
	if (isset($r)) {
		include('showanagrafica.php');
	}
    ?>
</div>



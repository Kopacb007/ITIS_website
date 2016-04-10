<?php 

if (isset($user['id'])) {

	$user_id = $user['id'];

    $cond = "WHERE users.id = $user_id ORDER BY assenze.data DESC";
	
	$q = "SELECT 
		tipo_assenza.id AS Tipo, 
		assenze.data AS Data, 
		assenze.orario AS Orario, 
		assenze.data_fine AS 'Data Fine', 
		assenze.orario_fine AS 'Orario Fine', 
		giustificazioni.data AS 'Data Giustificazione',
		CONCAT(docenti.cognome, ' ', docenti.nome) AS 'Giustificato Da',
        tipo_giustificazione.id AS 'Giustificato Tipo'
		FROM users 
		INNER JOIN assenze ON users.id = assenze.user_id
        INNER JOIN tipo_assenza ON assenze.tipo_id = tipo_assenza.id
        INNER JOIN giustificazioni ON giustificazioni.id = assenze.giustificazione_id
        INNER JOIN tipo_giustificazione ON giustificazioni.tipo = tipo_giustificazione.id
		INNER JOIN docenti ON giustificazioni.docente_id = docenti.id 
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

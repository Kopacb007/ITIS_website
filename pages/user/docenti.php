<?php 

if (isset($user['id'])) {

	$classe_id = mysqli_fetch_assoc(get_users_classe($dbc, $user['id']))['id'];
    
    $cond = "WHERE classi.id = $classe_id ORDER BY docenti.cognome";

	$q = "SELECT
        docenti.cognome AS Cognome, 
        docenti.nome AS Nome, 
        CONCAT(materie.name, ' ', materie.id) AS Materia, 
        docenti.ricevimento AS Ricevimento, 
        docenti.annotazioni AS Annotazioni
        FROM docenti 
        INNER JOIN materie ON materie.id = docenti.materia_id
        INNER JOIN insegnamenti ON docenti.id = insegnamenti.docente_id
        INNER JOIN classi ON classi.id = insegnamenti.classe_id
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



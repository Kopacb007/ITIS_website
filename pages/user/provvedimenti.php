<?php 

if (isset($user['id'])) {

	$user_id = $user['id'];
    
    $cond = "WHERE users.id = $user_id ORDER BY provvedimenti.data DESC";

	$q = "SELECT
        CONCAT(classi.numero, ' ', classi.lettera) AS Classe, 
        CONCAT(users.first, ' ', users.last) AS Studente, 
        provvedimenti.data AS Data,
        provvedimenti.descrizione AS Descrizione,
        CONCAT(docenti.cognome, ' ', docenti.nome) AS Docente
        FROM provvedimenti 
        INNER JOIN classi ON classi.id = provvedimenti.classe_id
        INNER JOIN users ON users.id = provvedimenti.user_id
        INNER JOIN docenti ON docenti.id = provvedimenti.docente_id
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



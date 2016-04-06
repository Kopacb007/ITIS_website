<?php 

if (isset($_POST['show'])) {

	$classe_id = $_POST['classe_id'];
    
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
    <div class="col-md-6 col-md-offset-3">

        <div class="box box-solid box-info">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Docenti Form</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="">
                    <div class="form-group">
                    <label>User:</label>
                    <select name="classe_id">

                        <?php 
                            $users = get_users($dbc);
                            while (
                                ($user = mysqli_fetch_assoc($users)) and
                                ($classe = mysqli_fetch_assoc(get_users_classe($dbc, $user['id'])))
                                ) { ?>
                                <option value=<?php echo "\"".$classe['id']."\"" ?>>
                                    <?php echo $user['first'] ?>
                                    <?php echo $user['last'] ?>,
                                    <?php echo $classe['numero'] ?>
                                    <?php echo $classe['lettera'] ?> 
                                    <?php echo $classe['indirizzo_id'] ?>
                                </option>
                        <?php } ?>

                    </select>
                    </div>
                    <div class="row">
                    <div class="col-xs-6">
                        <a href="#" onclick="goTo('maincontent.php')" class="btn btn-danger"><span><i class="fa fa-chevron-left"></i></span> Back</a>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" name="show" class="btn btn-success pull-right"><span><i class="fa fa-plus"></i></span> Show</button>
                    </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div>
    </div>
    
    <?php 
	if (isset($r)) {
		include('showtable.php');
	}
    ?>
</div>



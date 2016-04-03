<?php 

if (isset($_POST['show'])) {

	$classe_id = $_POST['classe_id'];
	$materia_id = $_POST['materia_id'];

	if ($materia_id === "all_materia") {
		$cond = "WHERE classi.id = $classe_id GROUP BY compiti.data DESC";
	} else {
		$cond = "WHERE classi.id = $classe_id AND materie.id = '$materia_id' GROUP BY compiti.data DESC";
	}

	$q = "SELECT
        compiti.data AS Data, 
        compiti.descrizione AS Descrizione, 
        compiti.data_consegna AS 'Data Consegna', 
        CONCAT(docenti.cognome, ' ', docenti.nome) AS 'Docente', 
        materie.name AS Materia, 
        compiti.allegati AS Allegati
        FROM compiti 
        INNER JOIN classi ON classi.id = compiti.classe_id
        INNER JOIN docenti ON docenti.id = compiti.docente_id
        INNER JOIN materie ON materie.id = compiti.materia_id
        $cond";
	$r = mysqli_query($dbc, $q) or die(mysql_error());

}


?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="box box-solid box-info">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Compiti Form</h3>
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
                    <div class="form-group">
                    <label>Materia:</label>
                    <select name="materia_id" class="short">
                        <option value="all_materia">
                            All materia
                        </option>

                        <?php 
                            $materie = get_materie($dbc);
                            while ($materia = mysqli_fetch_assoc($materie)) { ?>
                                <option value=<?php echo "\"".$materia['id']."\"" ?>>
                                <?php echo $materia['name'] . ", " . $materia['id'] ?>
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



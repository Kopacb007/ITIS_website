<?php 

if (isset($_POST['show'])) {

	$classe_id = mysqli_fetch_assoc(get_users_classe($dbc, $user['id']))['id'];
	$materia_id = $_POST['materia_id'];

	if ($materia_id === "all_materia") {
		$cond = "WHERE classi.id = $classe_id ORDER BY argomenti.data DESC";
	} else {
		$cond = "WHERE classi.id = $classe_id AND materie.id = '$materia_id' ORDER BY Data DESC";
	}

	$q = "SELECT
        argomenti.data AS Data, 
        argomenti.descrizione AS Descrizione, 
        argomenti.modulo AS 'Modulo Didattico', 
        CONCAT(docenti.cognome, ' ', docenti.nome) AS 'Docente', 
        materie.name AS Materia, 
        argomenti.allegati AS Allegati
        FROM argomenti 
        INNER JOIN classi ON classi.id = argomenti.classe_id
        INNER JOIN docenti ON docenti.id = argomenti.docente_id
        INNER JOIN materie ON materie.id = argomenti.materia_id
        $cond";
	$r = mysqli_query($dbc, $q) or die(mysql_error());

}


?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="box box-solid box-info">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Argomenti svolti</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="">                    
                    <div class="row">
                        <div class="col-xs-12">
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
                        </div>
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



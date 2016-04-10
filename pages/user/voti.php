<?php 

if (isset($_POST['show'])) {

	$user_id = $user['id'];
	$materia_id = $_POST['materia_id'];

	if ($materia_id === "all_materia") {
		$cond = "WHERE users.id = $user_id ORDER BY Data DESC";
	} else {
		$cond = "WHERE users.id = $user_id AND materie.id = '$materia_id' ORDER BY Data DESC";
	}

	$q = "SELECT 
		voti.data AS Data, 
		materie.name AS Materia, 
		voti.tipo_voto AS Tipo, 
		voti.voto AS Voto, 
		voti.peso AS Peso, 
		voti.annotazioni AS Annotazioni,
		voti.argomento AS Argomento
		FROM users 
		INNER JOIN voti ON users.id = voti.user_id
		INNER JOIN materie ON voti.materia_id = materie.id $cond";
	$r = mysqli_query($dbc, $q) or die(mysql_error());

}


?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="box box-solid box-info">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Voti</h3>
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



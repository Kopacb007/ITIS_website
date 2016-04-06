<?php 

if (isset($_POST['show'])) {

	$user_id = $_POST['user_id'];
	$materia_id = $_POST['materia_id'];
    
	$q = "SELECT 
		voti.data AS Data, 
		materie.name AS Materia
		FROM users 
		INNER JOIN voti ON users.id = voti.user_id
		INNER JOIN materie ON voti.materia_id = materie.id 
        WHERE users.id = $user_id AND materie.id = '$materia_id' ORDER BY voti.data";
	$r = mysqli_query($dbc, $q) or die(mysql_error());
    
    $q = "SELECT
		voti.voto AS Voto
		FROM users 
		INNER JOIN voti ON users.id = voti.user_id
		INNER JOIN materie ON voti.materia_id = materie.id 
        WHERE users.id = $user_id AND materie.id = '$materia_id' ORDER BY voti.data";
	$voti = mysqli_query($dbc, $q) or die(mysql_error());

}


?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="box box-solid box-info">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Grafico Form</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="">
                    <div class="form-group">
                    <label>User:</label>
                    <select name="user_id">

                        <?php 
                            $users = get_users($dbc);
                            while (
                                ($user = mysqli_fetch_assoc($users)) and
                                ($classe = mysqli_fetch_assoc(get_users_classe($dbc, $user['id'])))
                                ) { ?>
                                <option value=<?php echo "\"".$user['id']."\"" ?>>
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
		include('showchart.php');
	}
    ?>
</div>



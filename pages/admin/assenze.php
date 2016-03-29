<?php 

if (isset($_POST['show'])) {

	$user_id = $_POST['user_id'];

    $cond = "WHERE users.id = $user_id";
	
	$q = "SELECT 
		tipo_assenza.id AS Tipo, 
		assenze.data AS Data, 
		assenze.orario AS Orario, 
		assenze.data_fine AS 'Data Fine', 
		assenze.orario_fine AS 'Orario Fine', 
		giustificazioni.data AS 'Data Giustificazione',
		(
            SELECT CONCAT(docenti.cognome, ' ', docenti.nome) 
            FROM docenti 
            INNER JOIN giustificazioni ON giustificazioni.docente_id = docenti.id
            INNER JOIN assenze ON assenze.giustificazione_id = giustificazioni.id
            INNER JOIN users ON assenze.user_id = users.id
            $cond
        ) AS 'Giustificato Da',
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
    <div class="col-md-6 col-md-offset-3">

    <div class="box box-solid box-info">
        <div class="box-header with-border text-center">
            <h3 class="box-title">Assenze Form</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form method="post" action="">
                <div class="form-group">
                <label>User:</label>
                <select name="user_id">

                    <?php 
                        $users = get_users($dbc);
                        while ($user = mysqli_fetch_assoc($users)) { ?>
                            <option value=<?php echo "\"".$user['id']."\"" ?>>
                            <?php echo $user['first'] ?> <?php echo $user['last'] ?>
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

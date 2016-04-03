<?php 

if (isset($_POST['show'])) {

	$user_id = $_POST['user_id'];
    
    $cond = "WHERE users.id = $user_id GROUP BY permessi.da_data DESC";

	$q = "SELECT
        permessi.da_data AS 'Da Data', 
        permessi.a_data AS 'A Data', 
        permessi.tipo_permesso AS Tipo,
        permessi.ora AS Ora,
        permessi.giorni AS Giorni
        FROM permessi 
        INNER JOIN tipo_permesso ON tipo_permesso.id = permessi.tipo_permesso
        INNER JOIN users ON users.id = permessi.user_id
        $cond";
	$r = mysqli_query($dbc, $q) or die(mysql_error());

}


?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="box box-solid box-info">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Permessi Form</h3>
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



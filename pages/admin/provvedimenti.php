<?php 

if (isset($_POST['show'])) {

	$user_id = $_POST['user_id'];
    
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
    <div class="col-md-6 col-md-offset-3">

        <div class="box box-solid box-info">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Provvedimenti disciplinari</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="">
                    <div class="row">
                        <div class="col-xs-12">
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



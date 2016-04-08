<div class="row">
    <div class="col-md-6 col-md-offset-3">
	    <div class="box box-solid box-info">
	        <div class="box-header with-border text-center">
	            <h3 class="box-title">Profiles Form</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	            <form method="post" action="">
	                <div class="form-group">
		                <label>User:</label>
		                <select name="user_id" id="users">

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
		                    <button type="button" onclick="test()" name="show" class="btn btn-success pull-right"><span><i class="fa fa-plus"></i></span> Show</button>
		                </div>
                	</div>
	            </form>
	        </div><!-- /.box-body -->
	    </div>
    </div>

    <div id="result">
    </div>
</div>

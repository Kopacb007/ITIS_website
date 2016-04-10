<div class="row">
    <div class="col-md-6 col-md-offset-3 animated fadeInRight">
        <div class="box box-solid box-info">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Edit Profile</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="">
                    <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" class="form-control" id="nome" value=<?php echo "\"". $user['first'] ."\"" ?> required>
                    </div>
                    <div class="form-group">
                    <label for="cognome">Cognome</label>
                    <input type="text" id="cognome" class="form-control" id="cognome" value=<?php echo "\"". $user['last'] ."\"" ?> required>
                    </div>
            
                    <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" id="telefono" class="form-control" id="telefono" value=<?php echo "\"". $user['telefono'] ."\"" ?> >
                    </div>
                    <div class="form-group">
                    <label for="cellulare">Cellulare</label>
                    <input type="text" id="cellulare" class="form-control" id="cellulare" value=<?php echo "\"". $user['cellulare'] ."\"" ?> >
                    </div>
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control" id="email" value=<?php echo "\"". $user['email'] ."\"" ?> >
                    </div>
                    <div class="form-group">
                    <label for="password">Your actual password</label>
                    <input type="password" id="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                    <label for="newpass">New password</label>
                    <input type="password" id="newpass" class="form-control" id="newpass">
                    </div>
                    <div class="form-group">
                    <label for="repass">Confirm the new password</label>
                    <input type="password" id="repass" class="form-control" id="repass">
                    </div>
                    <div class="row">
                    <div class="col-xs-6">
                        <a href="#" onclick="goTo('maincontent.php')" class="btn btn-danger"><span><i class="fa fa-chevron-left"></i></span> Back</a>
                    </div>
                    <div class="col-xs-6">
                        <button type="button" onclick="saveProfile()" name="save" class="btn btn-success pull-right"><span><i class="fa fa-floppy-o"></i></span> Save</button>
                    </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
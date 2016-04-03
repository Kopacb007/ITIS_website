<?php 

#Start session:
session_start();

include('config/setup.php'); 

if ($_POST) {

// TO MUCH HARD CODE => ENHANCE IT
  $q = "SELECT * FROM users WHERE first ='$_POST[userid]' AND password = SHA1('$_POST[password]')";
  $r = mysqli_query($dbc, $q);

  if (mysqli_num_rows($r) == 1) {

    $session_user_data = mysqli_fetch_assoc($r);

    $_SESSION['userid'] = $session_user_data['first'];
    $_SESSION['type'] = $session_user_data['type'];

    if ($_SESSION['type'] === 'admin') {
      header('Location: ../admin/index.php');
    } else {
      header('Location: ../user/index.php');
    }
    

  }

}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include('template/header.php') ?>
  </head>

  <body class="hold-transition login-page">
    <!-- ################## PAGE ##################### -->
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Log In</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="index.php" method="post" role="form">
          <div class="form-group has-feedback">
            <input type="text" name="userid" class="form-control" placeholder="Utente" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xs-12">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xs-6">
                <button type="reset" class="btn btn-danger btn-block btn-flat">Cancel   <span class="fa fa-refresh"></span></button>
              </div>
              <div class="col-xs-6">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In   <span class="fa fa-check"></span></button>
              </div>
            </div>
          </div>
          
        </form>

        <a href="#">I forgot my password</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- ################## SCRIPTS Section ##################### -->
    <?php include('config/js.php'); ?>
  </body>
</html>

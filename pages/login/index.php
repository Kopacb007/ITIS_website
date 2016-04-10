<?php 

#Start session:
session_start();

include('config/setup.php'); 

if ($_POST) {

// TOO MUCH HARD CODE => ENHANCE IT
  $q = "SELECT * FROM users WHERE first ='$_POST[userid]' AND password = SHA1('$_POST[password]')";
  $r = mysqli_query($dbc, $q);

  if (mysqli_num_rows($r) == 1) {

    $session_user_data = mysqli_fetch_assoc($r);

    $_SESSION['userid'] = $session_user_data['id'];
    $_SESSION['type'] = $session_user_data['type'];
    $_SESSION['last_session'] = $session_user_data['last_session'];
    $_SESSION['last_ip'] = $session_user_data['last_ip'];
    $_SESSION['current_date'] = getdate();
    $_SESSION['current_ip'] = getIpAddress();

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
          <div class="login-box-msg">
              <a class="btn btn-default" href="../../index.php"><i class="fa fa-home"></i></a>
          </div>
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
                    <div class="col-xs-6">
                        <button type="reset" class="btn btn-danger btn-block btn-flat">Cancel   <span class="fa fa-refresh"></span></button>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In   <span class="fa fa-check"></span></button>
                    </div>
                </div>
            </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- ################## SCRIPTS Section ##################### -->
    <?php include('config/js.php'); ?>
  </body>
</html>

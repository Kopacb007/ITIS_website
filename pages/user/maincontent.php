<?php 

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
    include('config/setup.php');
}

#Checking the session
if ((!isset($_SESSION['userid'])) || ($_SESSION['type'] !== 'student')) 
{
    header('Location: ../login/index.php');
}

?>

<div class="animated fadeInUp">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Info</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <p>
            <?php 
              echo 'Ultimo accesso il: '.$_SESSION['last_session'];
            ?> 
            dall'ip <?php echo $_SESSION['last_ip']; ?>
          </p>
        </div><!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <?php 
        if (isset($user['id'])) {
            
            $user_id = $user['id'];

            $cond = "WHERE users.id = $user_id ORDER BY Data DESC";

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
            
            if (isset($r)) {
                include('showtable.php');
            }
        }
    ?>
  </div>
  <!-- /.row -->
</div>
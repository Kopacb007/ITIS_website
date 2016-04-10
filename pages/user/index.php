<!-- https://almsaeedstudio.com/preview -->
<?php 

#Start the session:
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

#Checking the session
if ((!isset($_SESSION['userid'])) || ($_SESSION['type'] !== 'student')) 
{
    header('Location: ../login/index.php');
}

?>

<?php include('config/setup.php') ?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <?php include('template/header.php') ?>
  </head>

  <?php include('config/js.php') ?>
  
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><?php echo $classe['numero'] . $classe['lettera']; ?></i></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><?php echo $classe['numero'] . $classe['lettera'] . " " . $classe['indirizzo_id']; ?></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img <?php echo $user['img_source']; ?> class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $user['fullname']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img <?php echo $user['img_source']; ?> class="img-circle" alt="User Image">
                    <p>
                      <?php echo $user['fullname']; ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?page=profile" class="btn btn-default btn-flat">Profile <span><i class="fa fa-cogs"></i></span></a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out <span><i class="fa fa-sign-out"></i></span></a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
              <a href="#"><i class="fa fa-eye"></i><span>Visualizza</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="?page=voti">Voti</a></li>
                <li><a href="?page=assenze">Assenze</a></li>
                <li><a href="?page=argomenti">Argomenti svolti</a></li>
                <li><a href="?page=compiti">Compiti assegnati</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-bell"></i> <span>Notifiche</span> <i class="fa fa-angle-left pull-right"></i></a>              
              <ul class="treeview-menu">
                <li><a href="?page=comunicazioni">Comunicazioni</a></li>
                <li><a href="?page=compersonali">Comunicazioni personali</a></li>
                <li><a href="?page=provvedimenti">Provvedimenti disciplinari</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-bar-chart"></i> <span>Statistica</span> <i class="fa fa-angle-left pull-right"></i></a>              
              <ul class="treeview-menu">
                <li><a href="?page=grafico">Grafico</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>Other</span> <i class="fa fa-angle-left pull-right"></i></a>              
              <ul class="treeview-menu">
                <li><a href="?page=permessi">Permessi</a></li>
                <li><a href="?page=docenti">Docenti</a></li>
                <li><a href="?page=anagrafica">Dati anagrafici</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Registro Scolastico Elettronico
            <small>Versione per Studenti</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content" id="content">

          <?php 

            $page = isset($_GET['page']) ? trim($_GET['page']) : '' ;

            switch ($page) {
                case 'voti':
                    include('voti.php');
                    break;
                case 'assenze':
                    include('assenze.php');
                    break;
                case 'argomenti':
                    include('argomenti.php');
                    break;
                case 'compiti':
                    include('compiti.php');
                    break;
                case 'comunicazioni':
                    include('comunicazioni.php');
                    break;
                case 'compersonali':
                    include('compersonali.php');
                    break;
                case 'provvedimenti':
                    include('provvedimenti.php');
                    break;
                case 'permessi':
                    include('permessi.php');
                    break;
                case 'docenti':
                    include('docenti.php');
                    break;
                case 'anagrafica':
                    include('anagrafica.php');
                    break;
                case 'grafico':
                    include('grafico.php');
                    break;
                case 'profile':
                    include('profile.php');
                    break;
                    
                default:
                    include('maincontent.php');
                    break;
            }
           ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Powered by AdminLTE
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Stanislav</a>.</strong>
      </footer>

    </div><!-- ./wrapper -->
  </body>
</html>

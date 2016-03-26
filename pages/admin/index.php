<!-- https://almsaeedstudio.com/preview -->
<?php 

#Start the session:
session_start();

#Checking the session
if ((!isset($_SESSION['userid'])) || ($_SESSION['type'] !== 'admin')) 
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

  <body class="hold-transition skin-red sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><i class="fa fa-tachometer"></i></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Admin dashboard</span>
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
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile <span><i class="fa fa-cogs"></i></span></a>
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
                <li><a href="#">Voti</a></li>
                <li><a href="#">Voti per obiettivi</a></li>
                <li><a href="#">Assenze</a></li>
                <li><a href="#">Assenze in dettaglio</a></li>
                <li><a href="#">Indicatori</a></li>
                <li><a href="#">Argomenti svolti</a></li>
                <li><a href="#">Compiti assegnati</a></li>
                
                <li><a href="#">Valutazione primo periodo</a></li>
                <li><a href="#">Valutazione finale</a></li>
                <li><a href="#">Pagelle primo periodo</a></li>
                <li><a href="#">Pagelle Finali</a></li>
                
                <li><a href="#">Scheda di valutazione IRC</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-bell"></i> <span>Notifiche</span> <i class="fa fa-angle-left pull-right"></i></a>              
              <ul class="treeview-menu">
                <li><a href="#">Comunicazioni</a></li>
                <li><a href="#">Comunicazioni per data</a></li>
                <li><a href="#">Comunicazioni personali</a></li>
                <li><a href="#">Comunicazioni alle famiglie</a></li>
                <li><a href="#">Provvedimenti disciplinari</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-bar-chart"></i> <span>Statistica</span> <i class="fa fa-angle-left pull-right"></i></a>              
              <ul class="treeview-menu">
                <li><a href="#">Grafico</a></li>
                <li><a href="#">Andamento generale</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-calendar"></i>
                <span>Calendario</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>Other</span> <i class="fa fa-angle-left pull-right"></i></a>              
              <ul class="treeview-menu">
                <li><a href="#">Permessi</a></li>
                <li><a href="#">Docenti</a></li>
                <li><a href="#">Programmi didattici</a></li>
                <li><a href="#">Documenti didattici</a></li>
                <li><a href="#">Dati anagrafici</a></li>
                <li><a href="#">Prenotazione colloqui</a></li>
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
            <small>Versione per Amministratori</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content" id="content">
          <div class="row">
            <div class="col-xs-12">
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
                      $date = getdate(); 
                      echo 'Ultimo accesso il: '.$date['mday'].'/'.$date['mon'].'/'.$date['year'];
                      echo ' alle ore: '.$date['hours'].':'.$date['minutes'];
                    ?> 
                    dall'ip <?php echo $user['ip']; ?>
                  </p>
                </div><!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box box-solid box-warning">

                    <div class="box-header with-border">
                      <h3 class="box-title">News</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->

                    <div class="box-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <a href="template/addpage.php"><i class="fa fa-file"></i></a>
                        </div>
                      </div>
                      <div class="row">
                        <!--Card-->
                        <?php 
                          while ($card = mysqli_fetch_assoc($news)) { ?>
                          
                          <?php include('template/card.php') ?>

                        <?php } ?>
                        <!--/Card-->
                      </div>
                      
                    </div><!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box box-solid box-success">

                    <div class="box-header with-border">
                      <h3 class="box-title">Circolari</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->

                    <div class="box-body">
                      <!--Card-->
                      <?php 
                        while ($card = mysqli_fetch_assoc($circolari)) { ?>
                        
                        <?php include('template/card.php') ?>

                      <?php } ?>
                      <!--Card-->
                    </div><!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Stanislav</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    <?php include('config/js.php') ?>
  </body>
</html>

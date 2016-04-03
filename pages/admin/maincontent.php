<?php 

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
    include('config/setup.php');
}

#Checking the session
if ((!isset($_SESSION['userid'])) || ($_SESSION['type'] !== 'admin')) 
{
    header('Location: ../login/index.php');
}

?>
<div class="animated fadeInLeft">
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
                <!--Card-->
                <?php 
                  while ($card = mysqli_fetch_assoc($news)) {
                      $type = "news";
                      include('template/card.php');  
                  }                
                ?>
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
                while ($card = mysqli_fetch_assoc($circolari)) {
                    $type = "circolari";
                    include('template/card.php');
                } 
              ?>
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
</div>
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
                  while ($card = mysqli_fetch_assoc($news)) { ?>
                  
                    <div class="col-sm-6">
                      <div class="box box-solid box-default">
                          <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $card['header']; ?></h3>
                            <div class="box-tools pull-right">
                              <div class="btn-group">
                                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <i class="fa fa-pencil"></i>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                      <li><a href="">Action</a></li>
                                      <li><a href="">Action</a></li>
                                      <li><a href="">Action</a></li>
                                      <li class="divider"></li>
                                      <li><a href="">Action</a></li>
                                  </ul>
                              </div>
                            </div><!-- /.box-tools -->
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <img src=<?php echo '"'.$card['image'].'"'; ?> class="img-responsive" alt="">
                            <p>
                              <?php echo substr( $card['body'] , 0, 150 ) . "..."; ?>
                            </p>
                            <a class="btn btn-info" href="?page=edit&type=news&id=<?php echo $card['id'] ?>">
                              <span><i class="fa fa-pencil"></i></span> Edit
                            </a>
                          </div><!-- /.box-body -->
                      </div>
                    <!-- /.box -->
                    </div>

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
                
                  <div class="col-sm-6">
                    <div class="box box-solid box-default">
                        <div class="box-header with-border">
                          <h3 class="box-title"><?php echo $card['header']; ?></h3>
                          <div class="box-tools pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="">Action</a></li>
                                    <li><a href="">Action</a></li>
                                    <li><a href="">Action</a></li>
                                    <li class="divider"></li>
                                    <li><a href="">Action</a></li>
                                </ul>
                            </div>
                          </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                          <img src=<?php echo '"'.$card['image'].'"'; ?> class="img-responsive" alt="">
                          <p>
                            <?php echo substr( $card['body'] , 0, 150 ) . "..."; ?>
                          </p>
                          <a class="btn btn-info" href="?page=edit&type=circolari&id=<?php echo $card['id'] ?>">
                            <span><i class="fa fa-pencil"></i></span> Edit Form
                          </a>
                        </div><!-- /.box-body -->
                    </div>
                  <!-- /.box -->
                  </div>

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
</div>

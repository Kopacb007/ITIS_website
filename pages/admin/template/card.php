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
                    <li><a onclick="showPage()" href="#">Edit</a></li>
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
          <a class="btn btn-info" href="#" onclick="showPage(<?php echo $card['id'] ?>)">
            <span><i class="fa fa-pencil"></i></span> Edit Form
          </a>
        </div><!-- /.box-body -->
    </div>
<!-- /.box -->
</div>

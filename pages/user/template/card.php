<div class="col-sm-6">
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $card['header']; ?></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <img src=<?php echo '"'.$card['image'].'"'; ?> class="img-responsive" alt="">
            <p>
                <?php echo substr( $card['body'] , 0, 150 ) . "..."; ?>
            </p>
            <a class="btn btn-info" href="?page=edit&type=<?php echo $type ?>&id=<?php echo $card['id'] ?>">
                <span><i class="fa fa-pencil"></i></span> Edit
            </a>
        </div><!-- /.box-body -->
    </div>
<!-- /.box -->
</div>
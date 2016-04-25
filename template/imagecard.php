<div class="col-md-6">
    <div class="card hoverable">
        <div class="card-image">
            <div class="view overlay hm-white-slight z-depth-1">
                <img src=<?php echo '"'.$card['image'].'"'; ?> class="img-responsive" alt="">
                <div class="mask waves-effect"></div>
            </div>
            <span class="card-title">
                <?php echo $card['header']; ?>
            </span>
        </div>
        <div class="card-content">
            <p>
                <?php 

                    //Cut the string until a limit and shows it up
                    echo substr( $card['body'] , 0, 150 ) . "...";

                ?>
            </p>
        </div>
        <div class="card-action">
            <a>Link</a>
        </div>
    </div>
</div>
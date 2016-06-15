<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('config/header.php'); ?>
    <title><?php echo $page['title'] . ' | ' . $site_title; ?></title>

    <!-- ################## CSS Section ##################### -->
    <?php include('config/css.php'); ?>
    <!-- ################## SCRIPTS Section ##################### -->
    <?php include('config/js.php'); ?>
</head>

<body>
    <!-- ################## PAGE ##################### -->
    <!-- Navigation -->
    <?php include(D_TEMPLATE . '/navigation.php') ?>
    <!-- D_TEMPLATE stands for dynamic_path of the template folder -->
    <!-- Swiper -->
    <div class="swiper-container shadow-bottom">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(img/carousel-item-1.jpg)">
            </div>
            <div class="swiper-slide" style="background-image:url(img/carousel-item-2.jpg)">
            </div>
            <div class="swiper-slide" style="background-image:url(img/carousel-item-3.jpg)">
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="carousel-foreground">
            <div class="carousel-text-container col-xs-8 col-xs-offset-2 text-center">
                <div class="va-container va-container-w va-container-h">
                    <div class="va-middle">
                        <h1 class="welcome-font">Crea il tuo futuro con noi</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="container-fluid">
        <div id="news-circolari" class="row">
            <div class="col-sm-6">
                <h1 class="underlined text-center">News</h1>
                <!--Image Card-->
                <?php 

                    while ($card = mysqli_fetch_assoc($news)) { ?>
                        
                        <?php include('template/imagecard.php') ?>

                <?php } ?>
                <!--Image Card-->
            </div>
            <div class="col-sm-6">
                <h1 class="underlined text-center">Circolari</h1>
                <!--Image Card-->
                <?php 

                    while ($card = mysqli_fetch_assoc($circolari)) { ?>
                        
                        <?php include('template/imagecard.php') ?>

                <?php } ?>
                <!--Image Card-->
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <div id="indirizzi" class="row">
            <div class="container text-center">
                <h1 class="underlined">Indirizzi</h1>
            </div>
            <!-- Indirizzi Columns  -->
            <!-- NOTE: ONLY 3 COLUMNS CAN BE SHOWED -->
            <?php 

                $columns = 3; // Maximum of columns

                for ($i=1; $i <= $columns; $i++) {
                    $indirizzo = mysqli_fetch_assoc($indirizzi); ?>

                    <?php include('template/indirizzo.php') ?>

                <?php } ?>
            <!-- /Indirizzi Columns -->
        </div>
        <!-- /.row -->
        <hr>
        <div id="downloads" class="row">
            <div class="container text-center">
                <h1 class="underlined">Downloads</h1>
            </div>
            <div class="container-fluid">
                <div class="row flex">
                    <div class="col-sm-6 phone transparent">
                        <img src="img/phone.png" class="img-responsive"/>
                    </div>
                    <div class="col-sm-6 flex-center download-links transparent">
                        <div class="flex-item">
                            <div class="col-md-6">
                                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.filippoalbertini.scuolamobile">
                                    <img class="img-responsive app-img center-block" alt="Get it on Google Play" src="img/google-play-badge.png" />
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a target="_blank" href="https://itunes.apple.com/it/app/scuolamobile-app/id978006941?mt=8">
                                    <img class="img-responsive app-img center-block" alt="Get it on App Store" src="img/app-store-badge.svg" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!--Footer section-->
    <?php include(D_TEMPLATE . '/footer.php') ?>
    <!--Back to top button-->
    <div class="back-to-top">
        <div class="fill-div flex-center">
            <div class="flex-item">
                <a class=" text-center">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
    </div>
    
</body>

</html>

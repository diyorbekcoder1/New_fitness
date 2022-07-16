<?php
include "./admin/php/connect.php";

$connect = new DB;

if ($connect) {
    $db = $connect->getConnect();
    $Last_New = $db->query("select price,title,name,bodytext from work_new  order by id desc limit 3");

    $poster = $db->query("select image,title,description,name from faqs  order by id desc limit 3");
    $query = $db->query("SELECT * FROM work_new order by id desc limit 5");
    $headera = $db->query("select image,price,name from work_new  order by id desc limit 3");
    $pic = $db->query("SELECT image,name,price FROM work_new ");
    $contact_header = $db->query("select  phone,address from contacts2  order by id desc limit 1");
    $logo = $db->query("select  image,name  from settings  order by id desc limit 1");
    $db2query = $db->query("select  title,description  from club_cards  order by id desc limit 1");
    $programs_logo = $db->query("select  title,image,Create_time  from programs  order by id desc limit 6");
    $programs_main = $db->query("select  title2,description  from programs  order by id desc limit 1");
    $banner_list = $db->query("select  image,title,title2,subtitle  from banners  order by id asc limit 1");
    $News_bannaer = $db->query("select  name,title,email,description,time  from news  order by id desc limit 3");
    $menus = $db->query("SELECT link,name,icon FROM menus ");
    $footer_image = $db->query("select image,title,bodytext from work_new  order by id desc limit 1");
    $logos = $db->query("select title2,bodytext from logotips  order by id desc limit 1");
    $nessen = $db->query("select  icon1,icon2,icon3,icon4,link1,link2,link3,link4  from contacts2 order by id desc limit 1 ");


    $nessen_header = [];
    if ($nessen->num_rows > 0) {
        while ($queryAll = $nessen->fetch_object()) {
            $nessen_header[] = $queryAll;
        }
    }



    $logos_header = [];
    if ($logos->num_rows > 0) {
        while ($queryAll = $logos->fetch_object()) {
            $logos_header[] = $queryAll;
        }
    }


    $footer_images = [];
    if ($footer_image->num_rows > 0) {
        while ($queryAll = $footer_image->fetch_object()) {
            $footer_images[] = $queryAll;
        }
    }



    $menus_about = [];
    if ($menus->num_rows > 0) {
        while ($queryAll = $menus->fetch_object()) {
            $menus_about[] = $queryAll;
        }
    }

    $News_abouts = [];
    if ($News_bannaer->num_rows > 0) {
        while ($queryAll = $News_bannaer->fetch_object()) {
            $News_abouts[] = $queryAll;
        }
    }

    $banners = [];
    if ($banner_list->num_rows > 0) {
        while ($queryAll = $banner_list->fetch_object()) {
            $banners[] = $queryAll;
        }
    }


    $programs_mains = [];
    if ($programs_main->num_rows > 0) {
        while ($queryAll = $programs_main->fetch_object()) {
            $programs_mains[] = $queryAll;
        }
    }




    $programs = [];
    if ($programs_logo->num_rows > 0) {
        while ($queryAll = $programs_logo->fetch_object()) {
            $programs[] = $queryAll;
        }
    }



    $club_card = [];
    if ($db2query->num_rows > 0) {
        while ($queryAll = $db2query->fetch_object()) {
            $club_card[] = $queryAll;
        }
    }



    $logotip = [];
    if ($logo->num_rows > 0) {
        while ($queryAll = $logo->fetch_object()) {
            $logotip[] = $queryAll;
        }
    }





    $contact_hedr = [];
    if ($contact_header->num_rows > 0) {
        while ($queryAll = $contact_header->fetch_object()) {
            $contact_hedr[] = $queryAll;
        }
    }






    $foots = [];
    if ($pic->num_rows > 0) {
        while ($queryAll = $pic->fetch_object()) {
            $foots[] = $queryAll;
        }
    }








    $work = [];
    if ($query->num_rows > 0) {
        while ($queryAll = $query->fetch_object()) {
            $work[] = $queryAll;
        }
    }

    $head = [];

    while ($row = $headera->fetch_object()) {
        //        print_r($row);
        $head[] = $row;
    }





    $headers = [];

    while ($row = $Last_New->fetch_object()) {
        //        print_r($row);
        $headers[] = $row;
    }
    $posters = [];

    while ($row = $poster->fetch_object()) {
        //        print_r($row);
        $posters[] = $row;
    }
}

?>










<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">

    <title>Fitmax </title>




    <!-- =================== META =================== -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- =================== STYLE =================== -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="home" class="page-fitness">
    <!--================ PRELOADER ================-->
    <div class="preloader-cover">
        <div id="cube-loader">
            <div class="caption">
                <div class="cube-loader">
                    <div class="cube loader-1"></div>
                    <div class="cube loader-2"></div>
                    <div class="cube loader-4"></div>
                    <div class="cube loader-3"></div>
                </div>
            </div>
        </div>
    </div>
    <!--============== PRELOADER END ==============-->

    <!-- ================= HEADER ================= -->
    <header class="header-fitness">
        <a href="#" class="nav-btn">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <div class="top-panel">
            <div class="container">
                <div class="row top-panel-row">
                    <div class="col-sm-4 top-panel-left">
                        <ul class="header-cont">
                            <?php if (isset($contact_hedr)) {
                                foreach ($contact_hedr as $contacts) { ?>

                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="mailto:crossFit@gmail.com"> <?= $contacts->address ?></a></li>


                            <?php }
                            } ?>


                        </ul>

                    </div>
                    <div class="col-sm-4 top-panel-center">
                        <ul class="header-cont">
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo date("F j, Y."); ?></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 top-panel-right">
                        <ul class="header-cont">
                            <?php if (isset($contact_hedr)) {
                                foreach ($contact_hedr as $contacts) { ?>


                                    <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+998939302209"> <?= $contacts->phone ?></a></li>


                            <?php }
                            } ?>

                        </ul>
                        <ul class="header-cont ml-3">
                            <a href="admin/auth-login.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu">
            <div class="container">
                <div class="header-logo">
                    <div class="row d-flex">
                        <?php if (isset($logotip)) {
                            foreach ($logotip as $logotips) { ?>

                                <div><a href="index.php" class="logo"><img style="width: 45px;height: 45px;" src="<?= $logotips->image ?>" alt="logo"></a></div>
                                <div style="margin-top: 7px;margin-left: 5px;"><a href="index.php" class="logo">
                                        <p><?= $logotips->name ?> </p>
                                    </a></div>
                    </div>


            <?php }
                        } ?>
                </div>
                <nav class="nav-menu">
                    <ul class="nav-list">
                        <?php if (isset($menus_about)) {
                            foreach ($menus_about as $menu_table) { ?>





                                <li>
                                    <a href="<?= $menu_table->link  ?>"><?= $menu_table->name  ?> <i class="<?= $menu_table->icon  ?>"></i></a>

                                </li>

                        <?php }
                        } ?>





                </nav>
            </div>
        </div>
    </header>
    <!-- =============== HEADER END =============== -->

    <!-- ============ S-FITNESS-SLIDER ============ -->
    <section class="s-fitness-slider">
        <div class="slider-navigation">
            <div class="container">
                <div class="slider-navigation-cover"></div>
            </div>
        </div>
        <div class="fitness-slider">

            <?php if (isset($head)) {
                foreach ($head as $come) { ?>

                    <div class="fitness-slide">
                        <div class="fitness-slider-effect">
                            <div data-hover-only="true" class="scene">
                                <span class="scene-item" data-depth="0.4" style="background-image: url(assets/img/effect-1-1.svg);"></span>
                            </div>
                        </div>
                        <div class="slide-img-cover">
                            <div data-hover-only="true" class="scene">
                                <img class="slide-img" style="border-radius: 5%" data-depth="0.5" src="<?= $come->image ?>" alt="img">
                            </div>
                        </div>
                        <div class="container">
                            <img class="slide-img-effect" src="assets/img/slider-square.svg" alt="img">
                            <div class="text-bg">yourself</div>
                            <div class="fitness-slide-cover">
                                <h2 class="title"><?= $come->price ?> <span><?= $come->name ?> </span></h2>
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>





        </div>
    </section>
    <!-- ========== S-FITNESS-SLIDER END ========== -->

    <!-- ============ S-WELCOME-FITNESS ============ -->
    <section class="s-welcome-fitness ">
        <div class="container ">
            <div class="welcome-fitness-row">
                <div class="welcome-fitness-img">
                    <img class="rx-lazy" src="assets/img/placeholder-all.png" data-src="assets/img/home2-about.jpg" alt="img">
                </div>
                <div class="welcome-fitness-item">
                    <div class="welcome-fitness-info">
                        <?php if (isset($logos_header)) {
                            foreach ($logos_header as $logos_headers) { ?>


                                <h2 class="title-decor">Welcome To <span><?= $logos_headers->title2 ?></span></h2>
                                <p><?= $logos_headers->bodytext ?></p>


                        <?php }
                        } ?>





                    </div>
                    <img class="fitness-img rx-lazy" src="assets/img/placeholder-all.png" data-src="assets/img/home2-about-2.jpg" alt="img">
                </div>
            </div>
        </div>
    </section>
    <!-- ========== S-WELCOME-FITNESS END ========== -->

    <!-- ============== S-CLUB-CARDS ============== -->
    <section class="s-club-cards club-cards-lite club-cards-fitness">



        <span class="section-title-bg">Club Cards</span>


        <div class="container">
            <?php if (isset($club_card)) {
                foreach ($club_card as $club_c) { ?>



                    <h2 class="title-decor">Club <span><?= $club_c->title ?></span></h2>

                    <div class="d-flex justify-content-center align-content-center mb-4">
                        <p> <?= substr($club_c->description, 0, 100) ?></p>
                    </div>



            <?php }
            } ?>


            <div class="row">
                <?php if (isset($headers)) {
                    foreach ($headers as $header) { ?>
                        <div class="col-md-4 club-card-col">

                            <div class="club-card-item" style="background-image: url(assets/img/bg-price-1.svg);">
                                <div class="price-cover">
                                    <div class="price"> <?= $header->price ?></div>
                                    <div class="date"> <?= substr($header->bodytext, 0, 20) ?></div>
                                </div>
                                <div class="club-card-text">
                                    <p class="fs-14 m-0 font-weight-medium line-height-sm">
                                        <?= substr($header->title, 0, 80) ?>
                                    </p>
                                </div>
                                <a href="trainer.php" class="btn"><?= $header->name ?></a>
                            </div>




                        </div>

                <?php }
                } ?>
            </div>
        </div>
    </section>
    <!-- ============ S-CLUB-CARDS END ============ -->

    <!-- =========== FITNESS-OUR-PROGRAM =========== -->
    <section class="fitness-our-program" style="background-image: url(assets/img/bg-best.svg);">
        <span class="section-title-bg">Our Programs</span>
        <div class="container">
            <?php if (isset($programs_mains)) {
                foreach ($programs_mains as $programs_logo) { ?>

                    <h2 class="title-decor">Our <span><?= $programs_logo->title2 ?></span></h2>
                    <p class="slogan"> <?= substr($programs_logo->description, 0, 90) ?></p>

            <?php }
            } ?>

            <div class="row">

                <?php if (isset($programs)) {
                    foreach ($programs as $programs_table) { ?>


                        <div class="col-sm-4 fitness-program-col">
                            <div class="fitness-program-item">
                                <div class="fitness-program-item-front" style="background-image: url(<?= $programs_table->image ?>);">
                                    <div class="fitness-program-item-inner">
                                        <div class="date"><?= $programs_table->Create_time ?></div>
                                        <h3><?= $programs_table->title ?></h3>
                                    </div>
                                </div>
                                <div class="fitness-program-item-back" style="background-image: url(<?= $programs_table->image ?>);">
                                    <a href="program.html" class="fitness-program-item-inner">
                                        <div class="date"><?= $programs_table->Create_time ?></div>
                                        <h3><?= $programs_table->title ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>

                <?php }
                } ?>
            </div>
            <a href="program.html" class="btn">view more</a>
        </div>
    </section>
    <!-- ========= FITNESS-OUR-PROGRAM END ========= -->

    <!-- ============== S-BEST-TRAINER ============== -->
    <section class="s-best-trainer fitness-best-trainer">
        <span class="section-title-bg">Best Trainer</span>
        <div class="container">
            <h2 class="title-decor">Best <span>Trainer</span></h2>
            <p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim.</p>
        </div>
        <div class="best-trainer-slider">
            <?php
            if (isset($work)) {
                foreach ($work as $key => $works) {
                    $cat = $db->query("select  Sport_name from categories where id= $works->category_id");
                    $cat1 = $cat->fetch_object();
            ?>

                    <a href="trainer.php" class="best-trainer-slide">
                        <div class="best-trainer-img">
                            <img style="width: 400px;height: 400px;font-family: bold" src=" <?= $works->image ?>" alt="img">
                        </div>
                        <h3 class="name"><?= $works->name ?></h3>

                        <div style="font-family: bold" class="prof"><?= $cat1->Sport_name ?></div>
                    </a>




            <?php }
            } ?>



        </div>
    </section>
    <!-- ============ S-BEST-TRAINER END ============ -->

    <!-- ============= S-FITNESS-BANNER ============= -->
    <section class="s-fitness-banner ">

        <?php if (isset($banners)) {
            foreach ($banners as $banner_tables) { ?>

                <div class="fitness-banner-effect" style="background-image: url(assets/img/bg-best.svg);"></div>
                <div class="container">
                    <div class="fitness-banner-row">
                        <div class="fitness-banner-left" style="background-image: url(<?= $banner_tables->image ?>);"></div>
                        <div class="fitness-banner-right">
                            <h2><?= $banner_tables->title2 ?> <span><?= $banner_tables->title ?></span> <?= $banner_tables->subtitle ?> </h2>
                            <p>are you a trainer? <a href="trainer.php">check this out.</a></p>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>



    </section>
    <!-- =========== S-FITNESS-BANNER END =========== -->

    <!-- ============== S-TESTIMONIALS ============== -->
    <section class="s-testimonials testimonials-border s-fitness-testimonials" style="background-image: url(assets/img/bg-testimonials.jpg);">
        <div class="mask"></div>
        <img class="testimonials-effect" src="assets/img/bg-testi-2.svg" alt="effect">
        <div class="container">
            <div class="testimonials-slider">
                <?php foreach ($posters as $poster_new) : ?>

                    <div class="testimonial-slide">
                        <img src=" <?= $poster_new->image ?>" alt="" />
                        <h3 class="name"> <?= $poster_new->name ?></h3>
                        <div class="prof"> <?= substr($poster_new->title, 0, 80) ?></div>
                        <p> <?= substr($poster_new->description, 0, 80) ?></p>
                    </div>
                <?php endforeach; ?>




            </div>
        </div>
    </section>
    <!-- ============ S-TESTIMONIALS END ============ -->

    <!-- ============= S-FITNESS-POSTS ============= -->
    <section class="s-fitness-posts">
        <div class="section-title-bg">Latest News</div>

        <div class="container">

            <h2 class="title-decor">Latest <span>News</span> </h2>
            <p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim.</p>

            <div class="row">

                <?php foreach ($News_abouts as $News_link) : ?>

                    <div class="col-md-4 fitness-post-col">
                        <div class="post-item-cover">
                            <div class="post-header" style="background-image: url(assets/img/home-price-1.svg);">
                                <div class="date"><?= $News_link->time ?></div>
                            </div>
                            <div class="post-content">
                                <h4 style="text-align: center" class="title"><a href="single-blog.html"><?= substr($News_link->title, 0, 30) ?></a></h4>
                                <div style="text-align: center" class="text">
                                    <?= substr($News_link->description, 0, 90) ?>
                                </div>
                            </div>
                            <div class="post-footer">
                                <div class="meta">
                                    <span class="post-by"><i class="fa fa-user" aria-hidden="true"></i><a href="#">By : <?= $News_link->name ?></a></span>
                                    <span class="post-category"><i class="fa fa-tag" aria-hidden="true"></i><a href="#">Fitness</a></span>
                                    <span class="post-comment"><i class="fa fa-comment" aria-hidden="true"></i><a href="#">1 Comments(s)</a></span>
                                    <span class="post-tags"><i class="fa fa-hashtag" aria-hidden="true"></i><a href="#"><?= substr($News_link->email, 0, 15) ?></a></span>
                                </div>
                                <a href="" class="btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>



                <?php endforeach; ?>


            </div>


        </div>




    </section>
    <!-- =========== S-FITNESS-POSTS END =========== -->

    <!-- =========== S-FITNESS-GALLERY =========== -->
    <section class="s-fitness-gallery">
        <div class="section-title-bg">Our Gallery</div>
        <div class="container">
            <h2 class="title-decor">Our <span>Gallery</span></h2>
            <p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim.</p>
            <div class="row-gallery">
                <div class="grid-gallery">
                    <div class="grid-sizer"></div>

                    <?php
                    if (isset($foots)) {
                        foreach ($foots as $key => $pik) {

                    ?>


                            <div class="gallery-item">
                                <a href="<?= $pik->image ?>" data-fancybox="gallery1">
                                    <img src="<?= $pik->image ?>" alt="img">
                                    <div class="gal-item">
                                        <h4 class="title"><?= $pik->name ?></h4>
                                        <p><?= $pik->price ?></p>
                                    </div>
                                </a>
                            </div>


                    <?php }
                    } ?>






                </div>
            </div>
        </div>
    </section>
    <!-- =========== S-FITNESS-GALLERY END =========== -->

    <!-- ================== FOOTER ================== -->
    <footer class="footer-fitness">
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-item-logo">
                    <div class="header-logo">
                        <div class="row d-flex">
                            <?php if (isset($logotip)) {
                                foreach ($logotip as $logotips) { ?>

                                    <div><a href="index.php" class="logo"><img style="width: 75px;height: 75px;" src="<?= $logotips->image ?>" alt="logo"></a></div>
                                    <div style="margin-top: 7px;margin-left: 5px;"><a href="index.php" class="logo">
                                            <p style="font-size: 40px"><?= $logotips->name ?> </p>
                                        </a></div>
                        </div>
                        <ul class="social-list">
                            <?php if (isset($nessen_header)) {
                            foreach ($nessen_header as $logotips) { ?>
                                <li><a target="_blank" href="<?=$logotips->link1 ?>"><i class="<?=$logotips->icon1 ?>" ></i></a></li>
                                <li><a target="_blank" href="<?=$logotips->link2 ?>"><i class="<?=$logotips->icon2 ?>" aria-hidden="true"></i></a></li>
                                <li><a target="_blank" href="<?=$logotips->link3 ?>"><i class="<?=$logotips->icon3 ?>" aria-hidden="true"></i></a></li>
                                <li><a target="_blank" href="<?=$logotips->link4 ?>"><i class="<?=$logotips->icon4 ?>" aria-hidden="true"></i></a></li></li>
                            <?php }
                            } ?>
                        </ul>

                              <?php }
                            } ?>
                    </div>
                </div>
                <div class="col-md-3 footer-item footer-item-blog">
                    <h3>Trainers</h3>
                    <ul class="footer-blog">

                        <?php if (isset($footer_images)) {
                            foreach ($footer_images as $footer_logo) { ?>

                                <li>
                                    <a href="trainer.php" class="img-cover"><img src="<?= $footer_logo->image  ?>" alt="img"></a>
                                    <div class="footer-blog-info">
                                        <div class="name"><a href="blog.php"> <?= substr($footer_logo->title, 0, 30) ?></a></div>
                                        <p><?= substr($footer_logo->bodytext, 0, 70) ?></p>
                                    </div>
                                </li>

                        <?php }
                        } ?>




                    </ul>
                </div>
                <div class="col-md-3 footer-item footer-item-link">
                    <h3>Links</h3>
                    <ul class="footer-link">
                        <?php if (isset($menus_about)) {
                            foreach ($menus_about as $menus_footer) { ?>


                                <li><a href="<?= $menus_footer->link ?>"><?= $menus_footer->name ?></a></li>

                        <?php }
                        } ?>



                    </ul>
                </div>
                <div class="col-md-3 footer-item footer-item-subscribe">
                    <h3>Subscribe</h3>
                    <p>Strategi, teknologi og udviklingen.</p>
                    <form class="subscribe-form" method="post" action="./admin/php/subscribe_create.php" enctype="multipart/form-data">
                        <input type="email" name="email" placeholder="Your E-mail">
                        <button type="submit" class="btn-form"><i>Post</i></button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="copyright"><a href="#" target="_blank"></a></div>
            </div>
        </div>
    </footer>
    <!-- ================ FOOTER END ================ -->

    <!--=================== TO TOP ===================-->
    <a class="to-top" href="#home">
        <i class="fa fa-chevron-up" aria-hidden="true"></i>
    </a>
    <!--================= TO TOP END =================-->

    <!--=================== SCRIPT	===================-->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/isotope.pkgd.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/rx-lazy.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
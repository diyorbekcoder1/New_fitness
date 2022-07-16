<?php
include "./admin/php/connect.php";

$connect = new DB;

if ($connect) {
	$db = $connect->getConnect();
	$cards_m = $db->query("select price,title2,title,description from club_cards  order by id desc limit 3");
	$cards_teble = $db->query("select title,title2 from club_cards  order by id asc limit 1");
	$poster = $db->query("select image,title,bodytext,name from work_new  order by id desc limit 3");
	$trainer_photo = $db->query("select image,name,price from work_new  order by id desc limit 4");
	$contact_header = $db->query("select  phone,address,email from contacts2  order by id desc limit 1");
	$logo = $db->query("select  image,name  from settings  order by id desc limit 1");
	$banner_list = $db->query("select  image,title,title2,subtitle  from banners  order by id DESC limit 1");
	$menus = $db->query("SELECT link,name,icon FROM menus ");
	$footer_menu = $db->query("select  name,link  from menus  order by id asc limit 4");
	$nokis = $db->query("select image,title,bodytext from work_new  order by id desc limit 2");
	$footerContact = $db->query("select  name,link  from menus ");
    $servic = $db->query("select  image,title,title2,bodytext,image,name  from services  order by id DESC limit 3");
    $nessen = $db->query("select  icon1,icon2,icon3,icon4,link1,link2,link3,link4  from contacts2 order by id desc limit 1 ");


    $nessen_header = [];
    if ($nessen->num_rows > 0) {
        while ($queryAll = $nessen->fetch_object()) {
            $nessen_header[] = $queryAll;
        }
    }
    $header_servic = [];
    if ($servic->num_rows > 0) {
        while ($queryAll = $servic->fetch_object()) {
            $header_servic[] = $queryAll;
        }
    }







	$footer_twe = [];
	if ($footerContact->num_rows > 0) {
		while ($queryAll = $footerContact->fetch_object()) {
			$footer_twe[] = $queryAll;
		}
	}

	$footer_one = [];
	if ($nokis->num_rows > 0) {
		while ($queryAll = $nokis->fetch_object()) {
			$footer_one[] = $queryAll;
		}
	}
	$footer = [];
	if ($footer_menu->num_rows > 0) {
		while ($queryAll = $footer_menu->fetch_object()) {
			$footer[] = $queryAll;
		}
	}

	$menus_about = [];
	if ($menus->num_rows > 0) {
		while ($queryAll = $menus->fetch_object()) {
			$menus_about[] = $queryAll;
		}
	}
	$banners = [];
	if ($banner_list->num_rows > 0) {
		while ($queryAll = $banner_list->fetch_object()) {
			$banners[] = $queryAll;
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

	$headers = [];

	while ($row = $trainer_photo->fetch_object()) {
		//        print_r($row);
		$trainer[] = $row;
	}

	$legos = [];
	if ($cards_teble->num_rows > 0) {
		while ($queryAll = $cards_teble->fetch_object()) {
			$legos[] = $queryAll;
		}
	}





	$card_abouts = [];

	while ($row = $cards_m->fetch_object()) {
		//        print_r($row);
		$card_abouts[] = $row;
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
	<title>Fitmax - Services</title>
	<!-- =================== META =================== -->
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="assets/img/favicon.png">
	<!-- =================== STYLE =================== -->
	<link rel="stylesheet" href="assets/css/bootstrap-grid.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="home">
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
	<header class="header">
		<a href="#" class="nav-btn">
			<span></span>
			<span></span>
			<span></span>
		</a>
		<div class="top-panel">
			<div class="container">
				<div class="header-left">
					<ul class="header-cont">
						<?php if (isset($contact_hedr)) {
							foreach ($contact_hedr as $contacts) { ?>


								<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+998939302209"> <?= $contacts->phone ?></a></li>


						<?php }
						} ?>
						<ul class="header-cont">
							<li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo date("F j, Y."); ?></li>
						</ul>
					</ul>
				</div>
				<div class="header-right">
					<form class="search-form">
						<input type="search" class="search-form__field" placeholder="Search" value="" name="s">
						<button type="submit" class="search-form__submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
					<ul class="social-list">
                        <?php if (isset($nessen_header)) {
                            foreach ($nessen_header as $logotips) { ?>
                                <li><a target="_blank" href="<?=$logotips->link1 ?>"><i class="<?=$logotips->icon1 ?>" ></i></a></li>
                                <li><a target="_blank" href="<?=$logotips->link2 ?>"><i class="<?=$logotips->icon2 ?>" aria-hidden="true"></i></a></li>
                                <li><a target="_blank" href="<?=$logotips->link3 ?>"><i class="<?=$logotips->icon3 ?>" aria-hidden="true"></i></a></li>
                                <li><a target="_blank" href="<?=$logotips->link4 ?>"><i class="<?=$logotips->icon4 ?>" aria-hidden="true"></i></a></li></li>
                            <?php }
                        } ?>
						<li class="header-cont ">
							<a href="admin/auth-login.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
						</li>
					</ul>
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

	<!-- =============== HEADER-TITLE =============== -->
	<section class="s-header-title" style="background-image: url(assets/img/bg-1-min.png);">
		<div class="container">
			<h1 class="title">Services</h1>
			<ul class="breadcrambs">
				<li><a href="index.php">Home</a></li>
				<li>Services</li>
			</ul>
		</div>
	</section>
	<!-- ============= HEADER-TITLE END ============= -->

	<!-- ================ S-CROSSFIT ================ -->
	<section class="s-crossfit">
		<div class="container">
			<img src="assets/img/group-circle-2.svg" alt="img" class="crossfit-icon-1">
			<img src="assets/img/line-red-1.svg" alt="img" class="crossfit-icon-2">
			<img src="assets/img/tringle-about-top.svg" alt="img" class="crossfit-icon-3">



			<h2 class="title-decor">Welcome To <span>Crossfit</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
			<div class="row">

                <?php foreach ($header_servic as $servics) : ?>


				<div class="col-md-4 crossfit-col">
					<div class="crossfit-item">
						<img  src="<?= $servics->image ?>" alt="img">
						<h3><?= $servics->name ?></h3>
						<p><?= substr($servics->bodytext, 0, 110) ?></p>
						<a class="btn" href="trainer.php">view Schedule</a>
					</div>
				</div>


                <?php endforeach; ?>

			</div>
		</div>
	</section>
	<!-- ============== S-CROSSFIT END ============== -->

	<!-- ============== S-OUR-PROGRAMS ============== -->
	<section class="s-our-programs" style="background-image: url(assets/img/bg-programs.jpg);">
		<div class="mask"></div>
		<div class="our-programs-effect" style="background-image: url(assets/img/bg-programs.svg);"></div>
		<div class="container">
			<h2 class="title-decor">Our <span>Programs</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
			<div class="row">
				<?php foreach ($trainer as $trainers) : ?>



					<div class="col-sm-6 col-md-3 program-col">
						<div class="program-item">
							<div class="program-item-front" style="background-image: url(<?= $trainers->image ?>);">

								<div class="program-item-inner">
									<h3 style="color: red"><?= $trainers->name ?></h3>
								</div>
							</div>
							<div class="program-item-back" style="background-image: url(<?= $trainers->image ?>);">

								<div class="program-item-inner">
									<h3><?= $trainers->name ?></h3>
									<a href="trainer.php" class="btn"><?= $trainers->price ?></a>
								</div>
							</div>
						</div>
					</div>

				<?php endforeach; ?>








			</div>
		</div>
	</section>
	<!-- ============ S-OUR-PROGRAMS END ============ -->

	<!-- ============== S-CLUB-CARDS ============== -->
	<section class="s-club-cards club-cards-lite club-cards-fitness">

		<?php if (isset($legos)) {
			foreach ($legos as $hosts) { ?>

				<div class="container">
					<h2 class="title-decor">Club <span><?= $hosts->title ?></span></h2>
					<p class="slogan"> <?= substr($hosts->title2, 0, 90) ?></span></p>

			<?php }
		} ?>


			<div class="row">
				<?php if (isset($card_abouts)) {
					foreach ($card_abouts as $header) { ?>
						<div class="col-md-4 club-card-col">

							<div class="club-card-item" style="background-image: url(assets/img/bg-price-1.svg);">
								<div class="price-cover">
									<div class="price"> <?= $header->price ?></div>
									<div class="date"></div>
								</div>
								<div class="club-card-text">
									<p class="fs-14 m-0 font-weight-medium line-height-sm">
										<?= substr($header->description, 0, 90) ?>
									</p>
								</div>
								<a href="trainer.php" class="btn">Order new</a>
							</div>




						</div>

				<?php }
				} ?>
			</div>
				</div>
	</section>
	<!-- ============ S-CLUB-CARDS END ============ -->

	<!-- ============ S-CROSSFIT-BANNER ============ -->
	<section class="s-crossfit-banner">


		<?php if (isset($banners)) {
			foreach ($banners as $banner_tables) { ?>
				<div class="crossfit-banner-left" style="background-image: url(<?= $banner_tables->image ?>);"></div>
				<div class="crossfit-banner-right">
					<div class="text-top"><?= $banner_tables->title2 ?></div>
					<h2><?= $banner_tables->title ?></h2>
					<div class="text-bottom">free open <a href="trainer.php"><?= $banner_tables->subtitle ?></a></div>
				</div>


		<?php }
		} ?>
	</section>
	<!-- ========== S-CROSSFIT-BANNER END ========== -->

	<!-- =========== S-TRAINING-SCHEDULE =========== -->
	<section class="s-training-schedule" style="background-image: url(assets/img/bg-table-1.svg);">
		<div class="container">
			<h2 class="title-decor">Training <span>Schedule</span></h2>
			<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
			<div class="training-schedule-cover">
				<h3 class="training-schedule-top"><?php echo date("F j, Y."); ?></h3>
				<div class="training-schedule-table">
					<table>
						<thead>
							<th></th>
							<th>monday</th>
							<th>tuesday</th>
							<th>wednesday</th>
							<th>thursday</th>
							<th>friday</th>
							<th>saturday</th>
							<th>sunday</th>
						</thead>
						<tbody>
							<tr>
								<td>9-00</td>
								<td>
									<h4>body bulding</h4>
									<div class="date">9-00 – 11:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td>
									<h4>boxing</h4>
									<div class="date">9-00 – 11:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td>
									<h4>boxing</h4>
									<div class="date">9-00 – 11:00</div>
									<div class="name">Mark Klark</div>
								</td>
							</tr>
							<tr>
								<td>10-00</td>
								<td></td>
								<td>
									<h4>yoga</h4>
									<div class="date">10-00 – 12:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">10-00 – 12:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>11-00</td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">11-00 – 12:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">11-00 – 12:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
							</tr>
							<tr>
								<td>12-00</td>
								<td>
									<h4>body bulding</h4>
									<div class="date">12-00 – 13:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td>
									<h4>karate</h4>
									<div class="date">12-00 – 13:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<h4>karate</h4>
									<div class="date">12-00 – 13:00</div>
									<div class="name">Mark Klark</div>
								</td>
							</tr>
							<tr>
								<td>13-00</td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">13-00 – 14:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
								<td>
									<h4>body bulding</h4>
									<div class="date">13-00 – 14:00</div>
									<div class="name">Mark Klark</div>
								</td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!-- ========= S-TRAINING-SCHEDULE END ========= -->

	<!-- ================== FOOTER ================== -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 footer-item-logo">
					<div class="header-logo">
						<div class="row d-flex">
							<?php if (isset($logotip)) {
								foreach ($logotip as $logotips) { ?>

									<div><a href="index.php" class="logo"><img style="width: 75px;height: 75px;" src="<?= $logotips->image ?>" alt="logo"></a></div>
									<div style="margin-top: 7px;margin-left: 5px;"><a href="index.php" class="logo">
											<p style="font-size: 40px"><?= $logotips->name ?> </p>
										</a></div>
						</div>


				<?php }
							} ?>
					</div>

					<ul class="social-list">
						<li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.youtube.com/"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-md-2 footer-item footer-item-link">
					<h3>Links</h3>
					<ul class="footer-link">
						<?php if (isset($footer)) {
							foreach ($footer as $menus_footer) { ?>


								<li><a href="<?= $menus_footer->link ?>"><?= $menus_footer->name ?></a></li>

						<?php }
						} ?>



					</ul>
				</div>
				<div class="col-sm-6 col-lg-3 footer-item">
					<h3>Contact us</h3>
					<ul class="footer-cont">

						<?php if (isset($contact_hedr)) {
							foreach ($contact_hedr as $contacts) { ?>

								<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:18004886040"><?= $contacts->phone ?></a></li>
								<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:crossFit@gmail.com"><?= substr($contacts->email, 0, 20) ?></a></li>
								<li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="mailto:crossFit@gmail.com"><?= $contacts->address ?></a></li>
						<?php }
						} ?>

					</ul>
				</div>
				<div class="col-sm-6 col-lg-4 footer-item">
					<h3>Trainers</h3>
					<ul class="footer-blog">

						<?php if (isset($footer_one)) {
							foreach ($footer_one as $footer_logo) { ?>

								<li>
									<a href="trainer.php" class="img-cover"><img src="<?= $footer_logo->image  ?>" alt="img"></a>
									<div class="footer-blog-info">
										<div class="name"><a href="blog.php"> <?= substr($footer_logo->title, 0, 30) ?></a></div>
										<p><?= substr($footer_logo->bodytext, 0, 50) ?></p>
									</div>
								</li>

						<?php }
						} ?>




					</ul>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="copyright"><a href="#" target="_blank"></a></div>
				<ul class="footer-menu">
					<?php if (isset($footer_twe)) {
						foreach ($footer_twe as $contacts) { ?>



							<li><a href="<?= $contacts->link ?>"><?= $contacts->name ?></a></li>


					<?php }
					} ?>


				</ul>
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
	<script src="assets/js/scripts.js"></script>
</body>

</html>
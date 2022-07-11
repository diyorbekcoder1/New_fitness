<?php
session_start();
if (!isset($_SESSION['is_login'])) {
  header('Location: /admin/auth-login.php');
}
include './php/connect.php';
$connect = new DB();
if ($connect) {
  $db = $connect->getConnect();
  $contact = [];
  $db3query2 = $db->query("SELECT * FROM contacts");
  if ($db3query2->num_rows > 0) {
    while ($queryAll = $db3query2->fetch_object()) {
      $contact[] = $queryAll;
    }
  }



  $user = [];
  $db3query = $db->query("SELECT * FROM users");
  if ($db3query->num_rows > 0) {
    while ($queryAll = $db3query->fetch_object()) {
      $user[] = $queryAll;
    }
  }
  $query = $db->query("SELECT * FROM work_new");


  if ($query->num_rows > 0) {
    while ($queryAll = $query->fetch_object()) {
      $work[] = $queryAll;
    }
  }

  $query = $db->query("SELECT * FROM contacts order by id desc limit 5");


  if ($query->num_rows > 0) {
    while ($queryAll = $query->fetch_object()) {
      $help[] = $queryAll;
    }
  }




  $categories = [];
  $db2query = $db->query("SELECT * FROM categories");
  if ($db2query->num_rows > 0) {
    while ($queryAll = $db2query->fetch_object()) {
      $categories[] = $queryAll;
    }
  }
}


?>

<?php



?>






















<!DOCTYPE html>
<html lang="en">


<!-- index.php  21 Nov 2019 03:44:50 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      related to task.</span> <span class="time">30
                      Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                      Joshi</span> <span class="time messege-text">Please do as specify.
                      Let me
                      know if you have any query.</span> <span class="time">1
                      Days Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Client Requirements</span>
                    <span class="time">2 Days Ago</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                      Sugiharto</b> are now friends <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>

              <div class="dropdown-divider"></div>
              <a href="auth-login.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span class="logo-name">Otika</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="/index.php" class="nav-link"><i data-feather="monitor"></i><span>Fitmax</span></a>
            </li>
            <li class="dropdown">
              <a href="../admin/index.php" class="nav-link"><i data-feather="copy"></i><span>Home
                </span></a>

            </li>
            <li class="dropdown">
              <a href="portfolio.php"><i data-feather="command"></i><span>Gallery</span></a>

            </li>
            <li>
              <a href="auth-register.php"><i data-feather="user-check"></i><span>Register</span></a>

            </li>

            <li>
              <a href="ContactsaAbout.php"><i data-feather="mail"></i><span>Contact</span></a>

            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="settings"></i><span>Settings</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="settinges.php">Logo</a></li>
                <li><a class="nav-link" href="./club_table.php">Club_card</a></li>
                <li><a class="nav-link" href="./progrms_table.php">Our_programs</a></li>
                <li><a class="nav-link" href="./banner_table.php">Bannners</a></li>
                <li><a class="nav-link" href="./menu_table.php">Menu</a></li>

              </ul>
            </li>


            <li>
              <a href="about_table.php"><i data-feather="pie-chart"></i><span>About_Company</span></a>

            </li>
            <li>
              <a href="NewTable.php"><i data-feather="alert-triangle"></i><span>News add</span></a>

            </li>



            <li>
              <a href="faq_table.php"><i data-feather="box"></i><span>Faqs_about</span></a>

            </li>

            <li>
              <a href="Email_table.php"><i data-feather="book"></i><span>Subscribe</span></a>

            </li>
            <li>
              <a href="modul_table.php"><i data-feather="book"></i><span>Moduls</span></a>

            </li>
            <li>
              <a href="./brend_table.php"><i data-feather="sliders"></i><span>Brends</span></a>

            </li>


            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Tables</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./trainers_table.php">Trainers</a></li>
                <li><a class="nav-link" href="advance-table.php">Sports Type</a></li>
                <li><a class="nav-link" href="./Admin_table.php">Admins</a></li>

              </ul>
            </li>







          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">



          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Training participants</h4>
                  <div class="card-header-form">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead style="color:white">
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Task Status</th>
                          <th>Price</th>
                          <th>Create_date</th>
                          <th>Sport_type</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (isset($work)) {
                          foreach ($work as $key => $works) {
                            $cat = $db->query("select  Sport_name from categories where id= $works->category_id");
                            $cat1 = $cat->fetch_object();
                        ?>
                            <tr>
                              <th scope="row"><?= ++$key ?></th>
                              <td> <?= substr($works->name, 0, 30) ?></td>
                              <td><img style="width: 50px; height: 50px; border-radius: 50%;" src=" <?= $works->image ?>" alt=""></td>
                              <td class="align-middle">
                                <div class="progress-text">50%</div>
                                <div class="progress" data-height="6">
                                  <div class="progress-bar bg-success" data-width="50%"></div>
                                </div>
                              </td>
                              <td><?= $works->price ?></td>
                              <td><?= $works->create_time ?></td>
                              <td>
                                <div style=" padding: 10px 10px 10px 10px; border-radius: 30px; " ; class="badge  badge-info badge-shadow"><?= $cat1->Sport_name ?></div>
                              </td>
                              <td><a href="#" class="btn btn-outline-primary">Detail</a></td>

                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-lg-12 col-xl-6">
              <div class="card">
                <div class="card-header">
                  <h4>Messages about</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Text</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($help as $key => $users) : ?>
                          <tr>
                            <th scope="row"><?= ++$key ?></th>
                            <td><?= $users->name ?></td>
                            <td> <?= substr($users->email, 0, 10) ?></td>
                            <td> <?= substr($users->bodytext, 0, 10) ?></td>
                            <td><a href="#" class="btn btn-outline-primary">Detail</a></td>

                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-12 col-xl-6">
              <div class="card">
                <div class="card-header">
                  <h4>ADMINS</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Username</th>
                          <th>Register Admin</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($user as $key => $users) : ?>
                          <tr>
                            <th scope="row"><?= ++$key ?></th>
                            <td><?= $users->firstname ?></td>
                            <td> <?= substr($users->lastname, 0, 10) ?></td>
                            <td><?= $users->username ?></td>
                            <td>

                              <div style=" padding: 10px 20px 10px 20px; border-radius: 30px; " class="badge  <?= ($users->is_admin == 1) ? 'badge-success' : 'badge-danger' ?> badge-shadow"><?= ($users->is_admin == 1) ? 'Active' : 'deactive' ?></div>
                            </td>

                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- index.php  21 Nov 2019 03:47:04 GMT -->

</html>
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home Kitchen</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span>Home Kitchen</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="kitchens.php">Kitchens</a></li>
          <li><a href="recipes.php">Recipes</a></li>

          <?php
            if(!isset($_SESSION['loggedin'])) { ?>
              <li class="btn btn-success rounded-pill"><a href="cook-reg.php">Become a cook</a></li>
              <li class="book-a-table text-center mt-2 mt-lg-0"><a href="login.php">Login</a></li>
              <li class="book-a-table text-center mt-2 mt-lg-0"><a href="user-reg.php">Register</a></li>
      <?php }
            elseif(isset($_SESSION['loggedin']) && $_SESSION['role'] == 3) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-dark" href="user/user-profile.php">Profile</a>
                  <a class="dropdown-item text-dark" href="order.php">Order</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-dark" href="logout.php">Logout</a>
                </div>
              </li>
      <?php }
            elseif (isset($_SESSION['loggedin']) && $_SESSION['role'] == 2) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-dark" href="chef/chef-profile.php">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-dark" href="logout.php">Logout</a>
                </div>
              </li>
      <?php }
            elseif (isset($_SESSION['loggedin']) && $_SESSION['role'] == 1) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-dark" href="admin/admin-profile.php">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-dark" href="logout.php">Logout</a>
                </div>
              </li>
      <?php }
          ?>

        </ul>
      </nav>
      <!-- .nav-menu -->

    </div>
  </header>
  <!-- End Header -->
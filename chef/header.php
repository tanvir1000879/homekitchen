<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 2){
    header('location:../logout.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Chef - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../panel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../panel/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../panel/css/style.css" rel="stylesheet">

  <!-- Datatavles CSS for this page -->
  <link href="../panel/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="chef-profile.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="messages.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Inbox</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="my-kitchen.php">
          <i class="fas fa-fw fa-house-user"></i>
          <span>My Kitchen</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="chef-recipe.php">
          <i class="fas fa-fw fa-utensils"></i>
          <span>My Recipes</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="chef-order.php">
          <i class="fas fa-fw fa-file"></i>
          <span>My Orders</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="chef-hire.php">
          <i class="fas fa-fw fa-list"></i>
          <span>Event Appointments</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <?php

              include_once '../dbcon.php';
              $conn = connect();

              $sql = "SELECT * FROM conversations WHERE chef_id = '$id' AND status_c = '1'";
              $result = $conn->query($sql);
              $newNoti = mysqli_num_rows($result);
            ?>
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?=$newNoti?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Message Notifications
                </h6>

                <?php
                  $sql = "SELECT * FROM conversations WHERE chef_id = '$id' AND status_c = '1' ORDER BY id DESC";
                  $result = $conn->query($sql);

                  if ($result->num_rows < 1) { ?>
                    <p class="text-center mt-3">No New Messages</p>
              <?php
                  }
                  else {
                    foreach ($result as $row) { ?>

                      <a class="dropdown-item d-flex align-items-center" href="set_receiver.php?receiver_id=<?=$row['user_id']?>">
                        <div class="mr-3">
                          <div class="icon-circle bg-primary">
                            <i class="fas fa-envelope text-white"></i>
                          </div>
                        </div>
                        <div>
                          <div class="small text-gray-500"><?=$row['time_stamp']?></div>
                          <div class="text-truncate">
                            <span class="font-weight-bold"><?=$row['last_text']?></span>
                          </div>
                        </div>
                      </a>
                
                <?php
                    }
                  }
                ?>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php

                  $sql = "SELECT * FROM chefs WHERE chef_id='$id'";
                  $result = $conn->query($sql);

                  while($row = $result->fetch_assoc()) { ?>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$row['chef_name']?></span>
                <?php }
                ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="chef-profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="change-password.php">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
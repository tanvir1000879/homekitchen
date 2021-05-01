<?php
session_start();

  if ($_POST) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  include_once '../dbcon.php';
  $conn = connect();

      $sql= "SELECT * FROM admin WHERE admin_email='$email'";
      $result= $conn->query($sql);
      
      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if (password_verify($password, $row['pw']) && $row['role'] == 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['admin_id'];
            $_SESSION['name'] = $row['admin_name'];
            $_SESSION['email'] = $row['admin_email'];
            $_SESSION['role'] = $row['role'];

            header('location:admin-profile.php');
            exit();
          }
          else {
              $_SESSION['msg_error'] = 'Incorrect password';
              header('location:index.php');
              exit();
          }
        }
        
      }
      else {
        $_SESSION['msg_error'] = 'Incorrect email or not registered';
        header('location:index.php');
        exit();
      }

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

  <title>Admin - Login</title>

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
<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                                    </div>

                      <?php
                        if (isset($_SESSION['msg_success'])) { ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?=$_SESSION['msg_success']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  <?php }
                        unset($_SESSION['msg_success']);
                      ?>

                      <?php
                        if (isset($_SESSION['msg_error'])) { ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?=$_SESSION['msg_error']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  <?php }
                        unset($_SESSION['msg_error']);
                      ?>

                                    <form action="index.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control"
                                                name="email"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"
                                                name="password" placeholder="Password" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="../panel/vendor/jquery/jquery.min.js"></script>
  <script src="../panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../panel/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../panel/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../panel/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../panel/js/demo/chart-area-demo.js"></script>
  <script src="../panel/js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="../panel/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../panel/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../panel/js/demo/datatables-demo.js"></script>

  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

</body>

</html>
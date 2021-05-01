<?php
  include_once('header.php');

  if ($_POST) {

  $email = $_POST['email'];
  $password = $_POST['pass'];
  $type = $_POST['type'];

  include_once 'dbcon.php';
  $conn = connect();

    if ($type == "Chef") {
      $sql= "SELECT * FROM chefs WHERE chef_email='$email'";
      $result= $conn->query($sql);
      
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
          if (password_verify($password, $row['pw']) && $row['status'] == 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['chef_id'];
            $_SESSION['name'] = $row['chef_name'];
            $_SESSION['email'] = $row['chef_email'];
            $_SESSION['role'] = $row['role'];

            header('location:chef/chef-profile.php');
            exit();
          }
          elseif (password_verify($password, $row['pw']) && $row['status'] == 2) {
            $_SESSION['msg_error'] = 'Account awaiting activation, please try later';
            header('location:login.php');
            exit();
          }
          elseif (password_verify($password, $row['pw']) && $row['status'] == 0) {
            $_SESSION['msg_error'] = 'Please Verify Your Email First';
            header('location:login.php');
            exit();
          }
          elseif (password_verify($password, $row['pw']) && $row['status'] == 3) {
            $_SESSION['msg_error'] = 'Account Deactivated';
            header('location:login.php');
            exit();
          }
          else {
              $_SESSION['msg_error'] = 'Incorrect password';
              header('location:login.php');
              exit();
          }
        }
        
      }
      else {
        $_SESSION['msg_error'] = 'Incorrect email or not registered';
        header('location:login.php');
        exit();
      }   
    }

    else if ($type == "User") {
      $sql= "SELECT * FROM users WHERE user_email='$email'";
      $result= $conn->query($sql);
      
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
          if (password_verify($password, $row['pw']) && $row['status'] == 1) {

            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['name'] = $row['user_name'];
            $_SESSION['email'] = $row['user_email'];
            $_SESSION['role'] = $row['role'];

            header('location:index.php');
            exit();
          }
          elseif (password_verify($password, $row['pw']) && $row['status'] == 0) {
            $_SESSION['msg_error'] = 'Please Verify Your Email First';
            header('location:login.php');
            exit();
          }
          elseif (password_verify($password, $row['pw']) && $row['status'] == 2) {
            $_SESSION['msg_error'] = 'Account Deactivated';
            header('location:login.php');
            exit();
          }
          else {
              $_SESSION['msg_error'] = 'Incorrect password';
              header('location:login.php');
              exit();
          }
        }
        
      }
      else {
        $_SESSION['msg_error'] = 'Incorrect email or not registered';
        header('location:login.php');
        exit();
      }   
    }

  }
?>

  <main id="main">

    <!-- ======= Login Section ======= -->
    <section id="contact" class="contact mt-5">
      <div class="container">

        <div class="section-title">
          <h2><span>Login</span></h2>
          <p>Enter the world of Healthiness!</p>
        </div>
      </div>

      <div class="container mt-4">
        <div class="row">
          <div class="col-12 col-lg-6 mx-auto">

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

        <div class="card border-0 shadow">

          <div class="card-body">
        <form id="cookRegForm" name="cookRegForm" action="login.php" method="POST" enctype="multipart/form-data" onsubmit="return loginFunction()">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="enter email">
          </div>
          <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="enter password">
          </div>
          <div class="form-group">
            <label for="type">User type</label>
            <select class="custom-select" id="type" name="type">
              <option value="">select user type...</option>
              <option>Chef</option>
              <option>User</option>
            </select>
          </div>
          <button type="submit" class="btn btn-yellow btn-block mt-4">Submit</button>
          <div class="text-center mt-4">
            <p>Need an account ? <a href="user-reg.php">Register now</a></p>
          </div>
        </form>
         
          </div>
        </div>

          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<script>

function loginFunction() {

  var email = $('#email').val();
  var password = $('#pass').val();

  var emailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if (email == "") {
    $('#msgemail').html('Enter email address');
    $('#email').focus();
    $('#email').addClass('is-invalid');
    return false;
  }
  else if (!email.match(emailformat)) {
    $('#msgemail').html('Enter valid email address');
    $('#email').focus();
    $('#email').addClass('is-invalid');
    return false;
  }
  else if (password == "") {
    $('#msgpassword').html('Enter password');
    $('#pass').focus();
    $('#pass').addClass('is-invalid');
    return false;
  }
  else {
  }
  
}
</script>

<?php
  include_once('footer.php');
?>
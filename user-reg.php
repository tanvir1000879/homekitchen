<?php
  include_once('header.php');
?>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact mt-5">
      <div class="container">

        <div class="section-title">
          <h2><span>Join</span> our platform</h2>
          <p>Home is wherever you're with food.</p>
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
<form id="userRegForm" name="userRegForm" action="user-reg-sub.php" method="POST" onsubmit="return userRegFunction()">
  <div class="form-group">
    <label for="name">Full name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="enter name">
  </div>
 <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="enter email">
  </div>
  <div class="form-group">
    <label for="address">Residence address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="enter address">
  </div>
  <div class="form-group">
    <label for="phone">Phone no</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="enter phone">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="pass">Password</label>
      <input type="password" class="form-control" id="pass" name="pass" placeholder="enter password">
    </div>
    <div class="form-group col-md-6">
      <label for="conpass">Confirm password</label>
      <input type="password" class="form-control" id="conpass" name="conpass" placeholder="confirm password">
    </div>
  </div>
  <button type="submit" class="btn btn-yellow btn-block mt-4">Submit</button>
  <div class="text-center mt-4">
    <p>Already have an account ? <a href="login.php">Login now</a></p>
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

function userRegFunction() {

  var name = $('#name').val();
  var email = $('#email').val();
  var address = $('#address').val();
  var phone = $('#phone').val();
  var password = $('#pass').val();
  var conpassword = $('#conpass').val();

  var emailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if (name == "") {
    $('#msgfname').html('Enter first name');
    $('#name').focus();
    $('#name').addClass('is-invalid');
    return false;
  }
  else if (email == "") {
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
  else if (address == "") {
    $('#msgaddress').html('Enter address');
    $('#address').focus();
    $('#address').addClass('is-invalid');
    return false;
  }
  else if (phone == "") {
    $('#msgphone').html('Enter phone no');
    $('#phone').focus();
    $('#phone').addClass('is-invalid');
    return false;
  }
  else if (password == "") {
    $('#msgpassword').html('Enter password');
    $('#pass').focus();
    $('#pass').addClass('is-invalid');
    return false;
  }
  else if (conpassword == "") {
    $('#msgconpassword').html('Confirm your password');
    $('#conpass').focus();
    $('#conpass').addClass('is-invalid');
    return false;
  }
  else if (password != conpassword) {
    $('#msgconpassword').html('Password not matched');
    $('#conpass').focus();
    $('#conpass').addClass('is-invalid');
    return false;
  }
  else {
  }
  
}
</script>

<?php
  include_once('footer.php');
?>
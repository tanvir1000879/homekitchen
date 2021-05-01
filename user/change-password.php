<?php include_once('header.php'); ?>

<?php
  if ($_POST) {

    $oldpass = $_POST['oldpassword'];
    $newpass = $_POST['newpassword'];
    $conpass = $_POST['confirmpassword'];
    $role = $_SESSION['role'];

    include_once '../dbcon.php';
    $conn = connect();

    if ($newpass == $conpass) {
      if ($role == 3) {
        $sql = "SELECT * FROM users WHERE user_id = '$id'";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()) {
            if (password_verify($oldpass, $row['pw'])) {
              $hashed_password = password_hash($conpass, PASSWORD_DEFAULT);
              $sql2 = "UPDATE users SET pw = '$hashed_password' WHERE user_id = '$id'";
              $result2 = $conn->query($sql2);
              $_SESSION['msg_success'] = 'Password changed successfully';
            }
            else {
                $_SESSION['msg_error'] = 'Wrong old password';
            }
          }
          
        }
        else {
          $_SESSION['msg_error'] = 'Action not completed';
        }   
      }
    }
    else {
      $_SESSION['msg_error'] = 'New password & confirm password input did not match !';
    }

  }
?>

                  <div id="layoutSidenav_content">
                    <div class="container-fluid">

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

                        <div class="row mb-5">
                            <div class="col-xl-6">
                              <h1 class="h3 mb-2 text-gray-800">Change Password</h1>
                              <form action="change-password.php" method="POST">
                                <div class="form-group">
                                  <label for="title">Enter old password</label>
                                  <input type="password" class="form-control" name="oldpassword" required>
                                </div>
                                <div class="form-group">
                                  <label for="description">enter new password</label>
                                  <input type="password" class="form-control" name="newpassword" required>
                                </div>
                                <div class="form-group">
                                  <label for="year">confirm new password</label>
                                  <input type="password" class="form-control" name="confirmpassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Change passowrd</button>
                              </form>

                            </div>
                        </div>
                    </div>

<?php include_once('footer.php'); ?>
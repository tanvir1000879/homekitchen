<?php include_once 'header.php'; ?>

        <!-- Begin Page Content -->
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

          <!-- Page Heading -->
          <?php
            
            $sql = "SELECT * FROM chefs WHERE chef_id='$id'";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) { ?>

              <div class="row">
                <div class="col">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$row['chef_name']?></h1>
          <form action="edit-profile.php" method="POST">
      
      
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Full Name</label>
              <div class="col-sm-auto">
                <input type="text" class="form-control" name="name" value="<?=$row['chef_name']?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-6">
                <input type="email" readonly class="form-control-plaintext" name="email" value="<?=$row['chef_email']?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="address" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?=$row['chef_address']?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-sm-2 col-form-label">Phone</label>
              <div class="col-sm-auto">
                <input type="text" class="form-control" name="phone" value="<?=$row['chef_phone']?>" required>
              </div>
            </div>
            <div class="row">
              <div class="col-auto">
                <button type="submit" class="btn btn-primary">Edit Profile</button>
              </div>
              <div class="col-auto">
                <a href="change-password.php" class="btn btn-primary">Change Password</a>
              </div>
            </div>
          </form>                  
                </div>
              </div>

      <?php }
          ?>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<?php include_once 'footer.php'; ?>
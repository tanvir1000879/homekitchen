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
            
            $sql = "SELECT * FROM admin WHERE admin_id='$id'";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) { ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$row['admin_name']?></h1>
          <form action="edit-profile.php" method="POST">
		  
			
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Full Name</label>
              <div class="col-sm-auto">
                <input type="text" class="form-control" name="name" value="<?=$row['admin_name']?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-6">
                <input type="email" class="form-control" name="email" value="<?=$row['admin_email']?>" required>
              </div>
            </div>
            <div class="row">
             
              <div class="col-auto">
                <a href="change-password.php" class="btn btn-primary">Change Password</a>
              </div>
            </div>
          </form>

      <?php }
          ?>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<?php include_once 'footer.php'; ?>
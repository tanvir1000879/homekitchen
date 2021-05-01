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
            
            $sql = "SELECT * FROM kitchen WHERE chef_id='$id'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { ?>
                <!-- Page Heading -->
                <form action="edit-kitchen.php" method="POST">
                  <input type="hidden" name="kitchen_id" value="<?=$row['kitchen_id']?>">
                  <div class="form-group row">
                    <label for="kitchen" class="col-sm-2 col-form-label">Kitchen Name</label>
                    <div class="col-sm-auto">
                      <input type="text" class="form-control" name="kitchen" value="<?=$row['kitchen_name']?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Kitchen Address</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control-plaintext" name="address" value="<?=$row['kitchen_address']?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label">Kitchen Location</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control-plaintext" id="location" required value="<?=$row['location']?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Edit Kitchen Name</button>
                    </div>
                  </div>
                </form>
        <?php }
            }
            elseif ($result->num_rows < 1) { ?>
                <!-- Page Heading -->
                <form action="add-kitchen.php" method="POST">

                  <div class="form-group row">
                    <label for="kitchen" class="col-sm-2 col-form-label">Kitchen Name</label>
                    <div class="col-sm-auto">
                      <input type="text" class="form-control" name="kitchen" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Kitchen Address</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="address" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label">Kitchen Location</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" list="locationList" id="location" name="location" placeholder="type to search..." required>
                      <datalist id="locationList">
                       <option value="Banani">
                       <option value="Bashundha">
                       <option value="Dhaka Cantt.">
                       <option value="Dhanmondi">
                       <option value="Gulshan">
                       <option value="Jatrabari">
                       <option value="Joypara">
                       <option value="Khilgaon">
                       <option value="Khilkhet">
                       <option value="Lalbag">
                       <option value="Mirpur">
                       <option value="Mohammadpur">
                       <option value="Motijheel">
                       <option value="New market">
                       <option value="Palton">
                       <option value="Ramna">
                       <option value="Sabujbag">
                       <option value="Sutrapur">
                       <option value="Tejgaon">
                       <option value="Uttara">
                      </datalist>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Create Kitchen</button>
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
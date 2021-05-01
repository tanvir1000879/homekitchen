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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Active Kitchens</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kitchen Name</th>
                      <th>Address</th>
                      <th>Location</th>
                      <th>Chef ID</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM kitchen WHERE status = 1";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['kitchen_name']?></td>
                          <td><?=$row['kitchen_address']?></td>
                          <td><?=$row['location']?></td>
                          <td><?=$row['chef_id']?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-danger" href="deactivate-kitchen.php?kitchen_id=<?=$row['kitchen_id']?>">Deactivate</a>
                          </td>
                        </tr>
                <?php }

                    }
                    elseif ($result->num_rows < 1) {
                      # code...
                    }

                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Deactived/Pending Kitchens</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kitchen Name</th>
                      <th>Address</th>
                      <th>Location</th>
                      <th>Chef ID</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM kitchen WHERE status = 0";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['kitchen_name']?></td>
                          <td><?=$row['kitchen_address']?></td>
                          <td><?=$row['location']?></td>
                          <td><?=$row['chef_id']?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-success" href="activate-kitchen.php?kitchen_id=<?=$row['kitchen_id']?>">Activate</a>
                          </td>
                        </tr>
                <?php }

                    }
                    elseif ($result->num_rows < 1) {
                      # code...
                    }

                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<?php include_once 'footer.php'; ?>
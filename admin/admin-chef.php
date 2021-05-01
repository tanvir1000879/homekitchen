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
              <h6 class="m-0 font-weight-bold text-primary">Email Verified Chefs Awaiting Approval</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>NID</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM chefs WHERE status = 2";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['chef_name']?></td>
                          <td><?=$row['chef_email']?></td>
                          <td><?=$row['chef_address']?></td>
                          <td><?=$row['chef_phone']?></td>
                          <td>
                            <a target="_blank" href="../nid/<?=$row['nid']?>"><?=$row['nid']?></a>
                          </td>
                          <td class="text-center">
                            <a title="Mark complete" class="btn btn-sm btn-success" href="approve-chef.php?chef_id=<?=$row['chef_id']?>&chef_email=<?=$row['chef_email']?>">Approve</a>
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
              <h6 class="m-0 font-weight-bold text-primary">Active Chefs</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>NID</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM chefs WHERE status = 1";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['chef_name']?></td>
                          <td><?=$row['chef_email']?></td>
                          <td><?=$row['chef_address']?></td>
                          <td><?=$row['chef_phone']?></td>
                          <td>
                            <a target="_blank" href="../nid/<?=$row['nid']?>"><?=$row['nid']?></a>
                          </td>
                          <td class="text-center">
                            <a title="Mark complete" class="btn btn-sm btn-danger" href="deactivate-chef.php?chef_id=<?=$row['chef_id']?>">Deactive</a>
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
              <h6 class="m-0 font-weight-bold text-primary">Deactivated Chef Account</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>NID</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM chefs WHERE status = 3";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['chef_name']?></td>
                          <td><?=$row['chef_email']?></td>
                          <td><?=$row['chef_address']?></td>
                          <td><?=$row['chef_phone']?></td>
                          <td>
                            <a target="_blank" href="../nid/<?=$row['nid']?>"><?=$row['nid']?></a>
                          </td>
                          <td class="text-center">
                            <a title="Mark complete" class="btn btn-sm btn-info" href="activate-chef.php?chef_id=<?=$row['chef_id']?>">Activate</a>
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
              <h6 class="m-0 font-weight-bold text-primary">Account Awaiting for Email Verification</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>NID</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM chefs WHERE status = 0";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['chef_name']?></td>
                          <td><?=$row['chef_email']?></td>
                          <td><?=$row['chef_address']?></td>
                          <td><?=$row['chef_phone']?></td>
                          <td>
                            <a target="_blank" href="../nid/<?=$row['nid']?>"><?=$row['nid']?></a>
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
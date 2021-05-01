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
              <h6 class="m-0 font-weight-bold text-warning">Pending Event apointment</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Customer name</th>
                      <th>Customer phone</th>
                      <th>Event address</th>
                      <th>Event Date</th>
                      <th>Event category</th>
                      <th>For people</th>
                      <th>Recipe</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM hired WHERE chef_id = '$id' AND status = 'Pending'";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['user_name']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['event_date']?></td>
                          <td><?=$row['event_category']?></td>
                          <td><?=$row['for_people']?></td>
                          <td><?=$row['recipe']?></td>
                          <td class="text-warning"><?=$row['status']?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-success" href="set_receiver.php?receiver_id=<?=$row['user_id']?>">Chat</a>
                            <a class="btn btn-sm btn-success mt-2" href="hire-accept.php?hire_id=<?=$row['hire_id']?>">Accept</a>
                            <a class="btn btn-sm btn-danger mt-2" href="hire-cancel.php?hire_id=<?=$row['hire_id']?>">Cancel</a>
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
              <h6 class="m-0 font-weight-bold text-info">Accepted Event apointment</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Customer name</th>
                      <th>Customer phone</th>
                      <th>Event address</th>
                      <th>Event Date</th>
                      <th>Event category</th>
                      <th>For people</th>
                      <th>Recipe</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM hired WHERE chef_id = '$id' AND status = 'Accepted'";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['user_name']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['event_date']?></td>
                          <td><?=$row['event_category']?></td>
                          <td><?=$row['for_people']?></td>
                          <td><?=$row['recipe']?></td>
                          <td class="text-info"><?=$row['status']?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-success" href="set_receiver.php?receiver_id=<?=$row['user_id']?>">Chat</a>
                            <a class="btn btn-sm btn-success mt-2" href="hire-complete.php?hire_id=<?=$row['hire_id']?>">Mark Complete</a>
                            <a class="btn btn-sm btn-danger mt-2" href="hire-cancel.php?hire_id=<?=$row['hire_id']?>">Cancel</a>
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
              <h6 class="m-0 font-weight-bold text-success">Completed Event apointment</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Customer name</th>
                      <th>Customer phone</th>
                      <th>Event address</th>
                      <th>Event Date</th>
                      <th>Event category</th>
                      <th>For people</th>
                      <th>Recipe</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM hired WHERE chef_id = '$id' AND status = 'Completed'";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['user_name']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['event_date']?></td>
                          <td><?=$row['event_category']?></td>
                          <td><?=$row['for_people']?></td>
                          <td><?=$row['recipe']?></td>
                          <td class="text-success"><?=$row['status']?></td>
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
              <h6 class="m-0 font-weight-bold text-danger">Cancelled Event apointment</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Customer name</th>
                      <th>Customer phone</th>
                      <th>Event address</th>
                      <th>Event Date</th>
                      <th>Event category</th>
                      <th>For people</th>
                      <th>Recipe</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM hired WHERE chef_id = '$id' AND status = 'Cancelled'";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['user_name']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['event_date']?></td>
                          <td><?=$row['event_category']?></td>
                          <td><?=$row['for_people']?></td>
                          <td><?=$row['recipe']?></td>
                          <td class="text-danger"><?=$row['status']?></td>
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
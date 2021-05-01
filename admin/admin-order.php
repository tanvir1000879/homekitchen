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
              <h6 class="m-0 font-weight-bold text-primary">Pending Delivery Orders</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Recipe ID</th>
                      <th>Recipe title</th>
                      <th>User name</th>
                      <th>User email</th>
                      <th>Delivery address</th>
                      <th>User phone</th>
                      <th>Chef ID</th>
                      <th>Order time</th>
                      <th>Payment</th>
                      <th>Transaction ID</th>
                      <th>Price</th>
                      <th>Rating</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM orders WHERE status = 0";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td>
                            <img class="img-fluid" src="../img/recipe/<?=$row['file']?>">
                          </td>
                          <td><?=$row['recipe_id']?></td>
                          <td><?=$row['title']?></td>
                          <td><?=$row['uname']?></td>
                          <td><?=$row['user_email']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['chef_id']?></td>
                          <td><?=$row['order_time']?></td>
                          <td><?=$row['payment']?></td>
                          <td><?=$row['tran_id']?></td>
                          <td><?=$row['price']?></td>
                          <td><?=$row['rating']?></td>
                          <td><?=$row['status']?></td>
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
              <h6 class="m-0 font-weight-bold text-primary">Completed Orders</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Recipe ID</th>
                      <th>Recipe title</th>
                      <th>User name</th>
                      <th>User email</th>
                      <th>Delivery address</th>
                      <th>User phone</th>
                      <th>Chef ID</th>
                      <th>Order time</th>
                      <th>Payment</th>
                      <th>Transaction ID</th>
                      <th>Price</th>
                      <th>Rating</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM orders WHERE status = 1 OR status = 2";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td>
                            <img class="img-fluid" src="../img/recipe/<?=$row['file']?>">
                          </td>
                          <td><?=$row['recipe_id']?></td>
                          <td><?=$row['title']?></td>
                          <td><?=$row['uname']?></td>
                          <td><?=$row['user_email']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['chef_id']?></td>
                          <td><?=$row['order_time']?></td>
                          <td><?=$row['payment']?></td>
                          <td><?=$row['tran_id']?></td>
                          <td><?=$row['price']?></td>
                          <td><?=$row['rating']?></td>
                          <td><?=$row['status']?></td>
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
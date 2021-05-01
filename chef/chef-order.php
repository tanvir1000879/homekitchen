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
              <h6 class="m-0 font-weight-bold text-warning">Orders Pending Delivery</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Recipe</th>
                      <th>Customer name</th>
                      <th>Customer email</th>
                      <th>Delivery address</th>
                      <th>Customer phone</th>
                      <th>Ordered time</th>
                      <th>Payment</th>
                      <th>Transaction ID</th>
                      <th>Quantity</th>
                      <th>Unit price</th>
                      <th>Total price</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM orders WHERE chef_id = '$id' AND status = 0";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><img class="img-fluid" src="../img/recipe/<?=$row['file']?>"></td>
                          <td><?=$row['title']?></td>
                          <td><?=$row['uname']?></td>
                          <td><?=$row['user_email']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['order_time']?></td>
                          <td><?=$row['payment']?></td>
                          <td><?=$row['tran_id']?></td>
                          <td><?=$row['quantity']?></td>
                          <td><?=$row['price']?></td>
                          <td><?=$row['total_price']?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-success" href="set_receiver.php?receiver_id=<?=$row['user_id']?>">Chat</a>
                            <a title="Mark complete" class="btn btn-sm btn-success mt-2" href="order-complete.php?order_id=<?=$row['order_id']?>">Mark complete</a>
                            <a title="Mark cancel" class="btn btn-sm btn-danger mt-2" href="order-cancel.php?order_id=<?=$row['order_id']?>">Cancel</a>
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


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Delivered Orders Waiting for rating</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Recipe</th>
                      <th>Customer name</th>
                      <th>Customer email</th>
                      <th>Delivery address</th>
                      <th>Customer phone</th>
                      <th>Ordered time</th>
                      <th>Payment</th>
                      <th>Transaction ID</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM orders WHERE chef_id = '$id' AND status = 1";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><img class="img-fluid" src="../img/recipe/<?=$row['file']?>"></td>
                          <td><?=$row['title']?></td>
                          <td><?=$row['uname']?></td>
                          <td><?=$row['user_email']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['order_time']?></td>
                          <td><?=$row['payment']?></td>
                          <td><?=$row['tran_id']?></td>
                          <td><?=$row['price']?></td>
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
                      <th>Recipe</th>
                      <th>Rating</th>
                      <th>Customer name</th>
                      <th>Customer email</th>
                      <th>Delivery address</th>
                      <th>Customer phone</th>
                      <th>Ordered time</th>
                      <th>Payment</th>
                      <th>Transaction ID</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM orders WHERE chef_id = '$id' AND status = 2";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><img class="img-fluid" src="../img/recipe/<?=$row['file']?>"></td>
                          <td><?=$row['title']?></td>
                          <td><?=$row['rating']?> <i class="fas fa-star fa-fw text-warning"></i></td>
                          <td><?=$row['uname']?></td>
                          <td><?=$row['user_email']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['order_time']?></td>
                          <td><?=$row['payment']?></td>
                          <td><?=$row['tran_id']?></td>
                          <td><?=$row['price']?></td>
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


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Cancelled Orders</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Recipe</th>
                      <th>Rating</th>
                      <th>Customer name</th>
                      <th>Customer email</th>
                      <th>Delivery address</th>
                      <th>Customer phone</th>
                      <th>Ordered time</th>
                      <th>Payment</th>
                      <th>Transaction ID</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM orders WHERE chef_id = '$id' AND status = 3";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><img class="img-fluid" src="../img/recipe/<?=$row['file']?>"></td>
                          <td><?=$row['title']?></td>
                          <td><?=$row['rating']?> <i class="fas fa-star fa-fw text-warning"></i></td>
                          <td><?=$row['uname']?></td>
                          <td><?=$row['user_email']?></td>
                          <td><?=$row['user_address']?></td>
                          <td><?=$row['user_phone']?></td>
                          <td><?=$row['order_time']?></td>
                          <td><?=$row['payment']?></td>
                          <td><?=$row['tran_id']?></td>
                          <td><?=$row['price']?></td>
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
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
          <div class="card shadow mb-5">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Orders Pending Delivery</h6>
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

                    $sql= "SELECT * FROM orders WHERE user_id = '$id' AND status = 0";
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
                            <a title="Mark complete" class="btn btn-sm btn-success" href="set_receiver.php?receiver_id=<?=$row['chef_id']?>">Chat</a>
                            <a title="Mark cancel" class="btn btn-sm btn-danger mt-2" href="order-cancel.php?order_id=<?=$row['order_id']?>">Cancel</a>
                          </td>
                        </tr>
                <?php }

                    }
                    elseif ($result->num_rows < 1) { ?>
                      No orders found
              <?php }

                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card shadow mb-5">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Your Order is Delivered!<br> TASTE IT AND RATE THE EXPERIENCE...</h6>
            </div>
            <div class="card-body">

              <div class="row">
                
                  <?php

                    $sql= "SELECT * FROM orders WHERE user_id = '$id' AND status = 1 ORDER BY order_id DESC";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                        <div class="card">
                          <img class="card-img-top img-fluid" src="../img/recipe/<?=$row['file']?>" alt="Card image cap">
                          <div class="card-body text-center">
                            <h5 class="card-title"><?=$row['title']?></h5>
                            <ul class="list-group list-group-flush">
                              <li class="d-flex justify-content-between align-items-center">
                                Order time:
                                <span><?=$row['order_time']?></span>
                              </li>
                              <li class="d-flex justify-content-between align-items-center">
                                Payment:
                                <span><?=$row['payment']?></span>
                              </li>
                              <li class="d-flex justify-content-between align-items-center">
                                Trnsaction ID:
                                <span><?=$row['tran_id']?></span>
                              </li>
                              <li class="d-flex justify-content-between align-items-center">
                                Price:
                                <span><?=$row['price']?></span>
                              </li>
                            </ul>

                      <div class="text-center">
                        <form action="rating.php" method="POST">
                          <div class="rating-css">
                            <div class="star-icon">
                              <input type="hidden" name="order_id" value="<?=$row['order_id']?>">
                              <input type="hidden" name="recipe_id" value="<?=$row['recipe_id']?>">

                              <input type="radio" name="rating" id="<?=$row['order_id']?>1" value="1" checked>
                              <label for="<?=$row['order_id']?>1" class="fa fa-star"></label>

                              <input type="radio" name="rating" id="<?=$row['order_id']?>2" value="2">
                              <label for="<?=$row['order_id']?>2" class="fa fa-star"></label>

                              <input type="radio" name="rating" id="<?=$row['order_id']?>3" value="3">
                              <label for="<?=$row['order_id']?>3" class="fa fa-star"></label>

                              <input type="radio" name="rating" id="<?=$row['order_id']?>4" value="4">
                              <label for="<?=$row['order_id']?>4" class="fa fa-star"></label>

                              <input type="radio" name="rating" id="<?=$row['order_id']?>5" value="5">
                              <label for="<?=$row['order_id']?>5" class="fa fa-star"></label>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-sm btn-success mx-auto">Submit</button>
                        </form>
                      </div>

                        </div>
                      </div>
                    </div>
                <?php }

                    }
                    elseif ($result->num_rows < 1) { ?>
                      No orders found
              <?php }

                  ?>

              </div>
              
            </div>
          </div>


          <!-- DataTales Example -->
          <div class="card shadow mb-5">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rated & Completed Orders</h6>
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

                    $sql= "SELECT * FROM orders WHERE user_id = '$id' AND status = 2";
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
                    elseif ($result->num_rows < 1) { ?>
                      No orders found
              <?php }

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

                    $sql= "SELECT * FROM orders WHERE user_id = '$id' AND status = 3";
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
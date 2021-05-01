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
              <h6 class="m-0 font-weight-bold text-primary">Active Recipes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Ingredients</th>
                      <th>For people</th>
                      <th>Location</th>
                      <th>Price</th>
                      <th>Rating</th>
                      <th>Rating Count</th>
                      <th>Kitchen ID</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM recipe WHERE status = 1";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td>
                            <img class="img-fluid" src="../img/recipe/<?=$row['file']?>">
                          </td>
                          <td><?=$row['title']?></td>
                          <td><?=$row['category']?></td>
                          <td><?=$row['description']?></td>
                          <td><?=$row['ingredients']?></td>
                          <td><?=$row['for_people']?></td>
                          <td><?=$row['location']?></td>
                          <td><?=$row['price']?></td>
                          <td><?=$row['rating']?></td>
                          <td><?=$row['rating_count']?></td>
                          <td><?=$row['kitchen_id']?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-danger" href="deactivate-recipe.php?recipe_id=<?=$row['recipe_id']?>">Deactivate</a>
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
              <h6 class="m-0 font-weight-bold text-primary">Deactive Recipes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Ingredients</th>
                      <th>For people</th>
                      <th>Location</th>
                      <th>Price</th>
                      <th>Rating</th>
                      <th>Rating Count</th>
                      <th>Kitchen ID</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM recipe WHERE status = 0";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td>
                            <img class="img-fluid" src="../img/recipe/<?=$row['file']?>">
                          </td>
                          <td><?=$row['title']?></td>
                          <td><?=$row['category']?></td>
                          <td><?=$row['description']?></td>
                          <td><?=$row['ingredients']?></td>
                          <td><?=$row['for_people']?></td>
                          <td><?=$row['location']?></td>
                          <td><?=$row['price']?></td>
                          <td><?=$row['rating']?></td>
                          <td><?=$row['rating_count']?></td>
                          <td><?=$row['kitchen_id']?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-success" href="activate-recipe.php?recipe_id=<?=$row['recipe_id']?>">Activate</a>
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
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
                <form action="add-recipe.php" method="POST" enctype="multipart/form-data">

                  <div class="form-group row">
                    <label for="recipe_name" class="col-sm-2 col-form-label">Recipe Name</label>
                    <div class="col-sm-auto">
                      <input type="text" class="form-control" name="recipe_name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="recipe_category" class="col-sm-2 col-form-label">Recipe Category</label>
                    <div class="col-sm-auto">
                      <select class="form-control" name="recipe_category" required>
                        <option value="">choose category...</option>
                        <option>Breakfast</option>
                        <option>Lunch</option>
                        <option>Dinner</option>
                        <option>Snacks</option>
                        <option>Dessert</option>
                        <option>Beef</option>
                        <option>Chicken</option>
                        <option>Fish</option>
                        <option>Vegetable</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Recipe Description</label>
                    <div class="col-sm-auto">
                      <textarea class="form-control" name="description" rows="2" required></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="recipe_ingredients" class="col-sm-2 col-form-label">Recipe Ingredients</label>
                    <div class="col-sm-auto">
                      <input type="text" class="form-control" name="recipe_ingredients" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="for_people" class="col-sm-2 col-form-label">For People</label>
                    <div class="col-sm-auto">
                      <input type="text" class="form-control" name="for_people" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Recipe Price</label>
                    <div class="col-sm-auto">
                      <input type="text" class="form-control" name="price" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="fileToUpload" class="col-sm-2 col-form-label">Recipe Image</label>
                    <div class="col-sm-auto">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Create Recipe</button>
                    </div>
                  </div>
                </form>

          <!-- DataTales Example -->
          <div class="card shadow my-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Active Recipes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Ingredients</th>
                      <th>For people</th>
                      <th>location</th>
                      <th>price</th>
                      <th>file</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql = "SELECT * FROM kitchen WHERE chef_id = '$id'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0){

                      while($row = $result->fetch_assoc()) {
                        $kitchen_id = $row['kitchen_id'];
                      }

                      $sql2= "SELECT * FROM recipe WHERE kitchen_id = '$kitchen_id' AND status = 1";
                      $result2 = $conn->query($sql2);

                      if($result2->num_rows > 0) {
                        foreach ($result2 as $row2) { ?>
                        <tr>
                          <td><?=$row2['title']?></td>
                          <td><?=$row2['category']?></td>
                          <td><?=$row2['description']?></td>
                          <td><?=$row2['ingredients']?></td>
                          <td><?=$row2['for_people']?></td>
                          <td><?=$row2['location']?></td>
                          <td><?=$row2['price']?></td>
                          <td><?=$row2['file']?></td>
                          <td><?=$row2['status']?></td>
                          <td class="text-center">
                            <a title="Deactivate" class="btn btn-sm btn-danger" href="deactivate-recipe.php?recipe_id=<?=$row2['recipe_id']?>">Deactivate</a>
                          </td>
                        </tr>
                  <?php }
                      }
                      elseif ($result->num_rows < 1) {

                      }
                    }
                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow my-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Deactive Recipes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Ingredients</th>
                      <th>For people</th>
                      <th>location</th>
                      <th>price</th>
                      <th>file</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql = "SELECT * FROM kitchen WHERE chef_id = '$id'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0){

                      while($row = $result->fetch_assoc()) {
                        $kitchen_id = $row['kitchen_id'];
                      }

                      $sql2= "SELECT * FROM recipe WHERE kitchen_id = '$kitchen_id' AND status = 0";
                      $result2 = $conn->query($sql2);

                      if($result2->num_rows > 0) {
                        foreach ($result2 as $row2) { ?>
                        <tr>
                          <td><?=$row2['title']?></td>
                          <td><?=$row2['category']?></td>
                          <td><?=$row2['description']?></td>
                          <td><?=$row2['ingredients']?></td>
                          <td><?=$row2['for_people']?></td>
                          <td><?=$row2['location']?></td>
                          <td><?=$row2['price']?></td>
                          <td><?=$row2['file']?></td>
                          <td><?=$row2['status']?></td>
                          <td class="text-center">
                            <a title="Activate" class="btn btn-sm btn-success" href="activate-recipe.php?recipe_id=<?=$row2['recipe_id']?>">Activate</a>
                          </td>
                        </tr>
                  <?php }
                      }
                      elseif ($result->num_rows < 1) {

                      }
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
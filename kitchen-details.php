<?php
  include_once('header.php');
?>

  <main id="main">

    <!-- ======= Banner Search Section ======= -->
    <section class="mt-5">
      <div class="container">
        <div class="row">

          <?php
            include_once 'dbcon.php';
            $conn = connect();

            if (isset($_GET['kitchen_id'])) {

              $kitchen_id = $_GET['kitchen_id'];
              $kitchen_name = $_GET['kitchen_name'];

              $sql= "SELECT * FROM recipe WHERE kitchen_id = '$kitchen_id' AND status = 1";
              $result= $conn->query($sql);

              if($result->num_rows > 0) { ?>

                <div class="col-12 mb-3">
                  <h3>Top Selling Recipes of - <?=$kitchen_name?></h3>
                </div>

              <?php
                foreach ($result as $row) {

                  if ($row['rating'] != 0) {
                    $ratingAVG = $row['rating'] / $row['rating_count'];
                  }
                  elseif ($row['rating'] == 0) {
                    $ratingAVG = 0;
                  }

                  $kitchen_id = $row['kitchen_id'] ?>

                  <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card border-0">
                      <a class="food-card" href="recipe-details.php?recipe_id=<?=$row['recipe_id']?>">
                      <div class="media pb-2">
                        <div class="media-body align-self-center d-flex justify-content-between align-items-center">
                          <?php
                            $sql2 = "SELECT * FROM kitchen WHERE kitchen_id = '$kitchen_id'";
                            $result2 = $conn->query($sql2);
                            if($result2->num_rows > 0) {
                              while($row2 = $result2->fetch_assoc()) { ?>
                                <h6 class="m-0"><?=$row2['kitchen_name']?></h6>
                        <?php }
                            }
                          ?>
                          <span class="badge badge-custom p-2"><i class="icofont-star text-warning"></i> <?=$ratingAVG?> <span class="text-muted">(<?=$row['rating_count']?>)</span></span>
                        </div>
                      </div>
                      <img class="card-img-top img-fluid border" src="img/recipe/<?=$row['file']?>" alt="Card image cap">
                      <div class="card-body p-0 mt-3">
                        <div class="d-flex justify-content-between align-items-center">
                          <h6 class="m-0 text-title"><b><?=$row['title']?></b></h6>
                          <span><b><span class="bng-font">৳</span><?=$row['price']?></b></span>
                        </div> 
                      </div>
                      </a>
                    </div>
                  </div>

          <?php }

              }

            }

            else {

              $sql= "SELECT * FROM recipe WHERE rating/rating_count > 3 ORDER BY rating_count DESC LIMIT 18";
              $result= $conn->query($sql);

              if($result->num_rows > 0) { ?>

                <div class="col-12 mb-3">
                  <h3>Top Selling Recipes</h3>
                </div>

            <?php
                foreach ($result as $row){

                  if ($row['rating'] != 0) {
                    $ratingAVG = $row['rating'] / $row['rating_count'];
                  }
                  elseif ($row['rating'] == 0) {
                    $ratingAVG = 0;
                  }

                  $kitchen_id = $row['kitchen_id'] ?>

                  <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card border-0">
                      <a class="food-card" href="recipe-details.php?recipe_id=<?=$row['recipe_id']?>">
                      <div class="media pb-2">
                        <div class="media-body align-self-center d-flex justify-content-between align-items-center">
                          <?php
                            $sql2 = "SELECT * FROM kitchen WHERE kitchen_id = '$kitchen_id'";
                            $result2 = $conn->query($sql2);
                            if($result2->num_rows > 0) {
                              while($row2 = $result2->fetch_assoc()) { ?>
                                <h6 class="m-0"><?=$row2['kitchen_name']?></h6>
                        <?php }
                            }
                          ?>
                          <span class="badge badge-custom p-2"><i class="icofont-star text-warning"></i> <?=$ratingAVG?> <span class="text-muted">(<?=$row['rating_count']?>)</span></span>
                        </div>
                      </div>
                      <img class="card-img-top img-fluid border" src="img/recipe/<?=$row['file']?>" alt="Card image cap">
                      <div class="card-body p-0 mt-3">
                        <div class="d-flex justify-content-between align-items-center">
                          <h6 class="m-0 text-title"><b><?=$row['title']?></b></h6>
                          <span><b><span class="bng-font">৳</span><?=$row['price']?></b></span>
                        </div> 
                      </div>
                      </a>
                    </div>
                  </div>

          <?php }

              }

            }
          ?>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php
  include_once('footer.php');
?>
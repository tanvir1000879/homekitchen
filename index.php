<?php
  include_once('header.php');
?>

  <main id="main">

    <!-- ======= Banner Search Section ======= -->
    <section class="banner-search">
      <div class="container">

        <div class="section-title text-left">
          <h2>Discover <span>Homemade Food</span> near you</h2>
        </div>

        <div class="row">
          <div class="col-12">
            <form class="form-inline" action="index.php" method="GET">
              <div class="input-group input-group-lg mb-2 mr-sm-2">
                <input type="text" class="form-control" list="locationList" id="search_string" name="search_string" placeholder="enter location or food..." required="">
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

              <button type="submit" class="btn btn-lg btn-custom mb-2">Find Food</button>
            </form>
          </div>
          <div class="col-12 col-lg-6">
            <p class="m-0">Popular areas in Dhaka</p>
            <a class="mr-3" href="index.php?search_string=Gulshan">Gulshan</a>
            <a class="mr-3" href="index.php?search_string=Banani">Banani</a>
            <a class="mr-3" href="index.php?search_string=Bashundhara">Bashundhara</a>
            <a class="mr-3" href="index.php?search_string=Baridhara">Baridhara</a>
            <a class="mr-3" href="index.php?search_string=Dhanmondi">Dhanmondi</a>
            <a class="mr-3" href="index.php?search_string=Mohammadpur">Mohammadpur</a>
            <a class="mr-3" href="index.php?search_string=Mirpur">Mirpur</a>
            <a class="mr-3" href="index.php?search_string=Uttara">Uttara</a>
          </div>
        </div>

      </div>
    </section>
    <!-- ======= Banner Search Section ======= -->

    <!-- ======= Banner Search Section ======= -->
    <section class="">
      <div class="container">
        <div class="row">

          <?php
            include_once 'dbcon.php';
            $conn = connect();

            if (isset($_GET['search_string'])) {

              $search_string = $_GET['search_string'];

              $sql= "SELECT * FROM recipe WHERE status = 1 AND (location = '$search_string' OR title LIKE '%$search_string%')";
              $result= $conn->query($sql);

              if($result->num_rows > 0) { ?>

                <div class="col-12 mb-3">
                  <h3>Search result for - <?=$search_string?></h3>
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
              else { ?>
                <h3>No result found</h3>
        <?php }

            }

            else {

              $sql= "SELECT * FROM recipe WHERE status = 1 AND rating_count >=1 ORDER BY rating_count DESC LIMIT 12";
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


    <section>
      <div class="container">
        <div class="row">

          <div class="col-12 mb-3">
            <h3>Favourite Categories</h3>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="recipes.php?category=Breakfast">
              <div class="media p-3 border rounded shadow mb-3">
                <img class="align-self-center mr-3" src="img/breakfast.png" width="80px" alt="image">
                <div class="media-body align-self-center text-center">
                  <h3 class="m-0">Breakfast</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="recipes.php?category=Lunch">
              <div class="media p-3 border rounded shadow mb-3">
                <img class="align-self-center mr-3" src="img/lunch.png" width="80px" alt="image">
                <div class="media-body align-self-center text-center">
                  <h3 class="m-0">Lunch</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="recipes.php?category=Dinner">
              <div class="media p-3 border rounded shadow mb-3">
                <img class="align-self-center mr-3" src="img/dinner.png" width="80px" alt="image">
                <div class="media-body align-self-center text-center">
                  <h3 class="m-0">Dinner</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="recipes.php?category=Snacks">
              <div class="media p-3 border rounded shadow mb-3">
                <img class="align-self-center mr-3" src="img/snacks.png" width="80px" alt="image">
                <div class="media-body align-self-center text-center">
                  <h3 class="m-0">Snacks</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="recipes.php?category=Dessert">
              <div class="media p-3 border rounded shadow mb-3">
                <img class="align-self-center mr-3" src="img/cake.png" width="80px" alt="image">
                <div class="media-body align-self-center text-center">
                  <h3 class="m-0">Dessert</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="recipes.php?category=Beef">
              <div class="media p-3 border rounded shadow mb-3">
                <img class="align-self-center mr-3" src="img/beef.png" width="80px" alt="image">
                <div class="media-body align-self-center text-center">
                  <h3 class="m-0">Beef</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="recipes.php?category=Chicken">
              <div class="media p-3 border rounded shadow mb-3">
                <img class="align-self-center mr-3" src="img/chicken.png" width="80px" alt="image">
                <div class="media-body align-self-center text-center">
                  <h3 class="m-0">Chicken</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="recipes.php?category=Fish">
              <div class="media p-3 border rounded shadow mb-3">
                <img class="align-self-center mr-3" src="img/fish.png" width="80px" alt="image">
                <div class="media-body align-self-center text-center">
                  <h3 class="m-0">Fish</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="recipes.php?category=Vegetable">
              <div class="media p-3 border rounded shadow mb-3">
                <img class="align-self-center mr-3" src="img/veg.png" width="80px" alt="image">
                <div class="media-body align-self-center text-center">
                  <h3 class="m-0">Vegetable</h3>
                </div>
              </div>
            </a>
          </div>

        </div>
      </div>
    </section>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Contact</span> Us</h2>
          <p>Send us your query or Report issues</p>
        </div>
      </div>

      <div class="container">

        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="send-report.php" method="POST">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required/>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required/>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required/>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-custom">Send</button></div>
            </form>            
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php
  include_once('footer.php');
?>
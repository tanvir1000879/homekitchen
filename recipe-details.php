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
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="icofont-location-pin text-custom"></i></div>
                </div>
                <input type="text" class="form-control" list="locationList" id="location" name="location" placeholder="Enter your delivery location" required="">
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
            <a class="mr-3" href="index.php?location=Gulshan">Gulshan</a>
            <a class="mr-3" href="index.php?location=Banani">Banani</a>
            <a class="mr-3" href="index.php?location=Bashundhara">Bashundhara</a>
            <a class="mr-3" href="index.php?location=Baridhara">Baridhara</a>
            <a class="mr-3" href="index.php?location=Dhanmondi">Dhanmondi</a>
            <a class="mr-3" href="index.php?location=Mohammadpur">Mohammadpur</a>
            <a class="mr-3" href="index.php?location=Mirpur">Mirpur</a>
            <a class="mr-3" href="index.php?location=Uttara">Uttara</a>
          </div>
        </div>

      </div>
    </section>
    <!-- ======= Banner Search Section ======= -->

<!-- Page Content -->
<section>
<div class="container">

    <?php
      if (isset($_GET['recipe_id'])) {

        $recipe_id = $_GET['recipe_id'];
        include_once 'dbcon.php';

        $conn = connect();

        $sql= "SELECT * FROM recipe WHERE recipe_id = '$recipe_id'";
        $result= $conn->query($sql);

        while($row = $result->fetch_assoc()) {
          if ($row['rating'] != 0) {
                    $ratingAVG = $row['rating'] / $row['rating_count'];
                  }
                  elseif ($row['rating'] == 0) {
                    $ratingAVG = 0;
                  }
          ?>

          <!-- Portfolio Item Row -->
          <div class="row">

            <div class="col-md-8 mb-4">
              <img class="w-100 border" src="img/recipe/<?=$row['file']?>" alt="">
            </div>

            <div class="col-md-4">

              <div class="d-flex justify-content-between align-items-center">
                <h2 class=""><?=$row['title']?></h2>
                <span class="badge badge-custom p-2"><i class="icofont-star text-warning"></i> <?=$ratingAVG?> <span class="text-muted">(<?=$row['rating_count']?>)</span></span>
              </div>              

              <p><?=$row['description']?></p>
              <h4 class="">Ingredients</h4>
              <p><?=$row['ingredients']?></p>
              <i class="fas fa-map-marker-alt"></i>

              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class=""><span class="bng-font">৳</span><b><?=$row['price']?></b></span>
                    <div class="d-flex">
                      <p class="m-0"><i class="icofont-users-alt-4 mr-3"> <?=$row['for_people']?></i></p>
                      <p class="m-0"><i class="icofont-location-pin"> <?=$row['location']?></i></p>
                    </div>
                  </div>
                  <?php
                    if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 3) { ?>
                      <a class="btn btn-custom btn-sm btn-block" href="logout.php">Login as Customer to Order</a>
              <?php }
                    else { ?>
                      <a class="btn btn-custom btn-sm btn-block" href="order.php?recipe_id=<?=$row['recipe_id']?>">Order</a>
              <?php }
                  ?>
                  
                </div>
              </div>

            </div>

          </div>
          <!-- /.row -->

  <?php
        }

      }
    ?>

</div>
</section>
<!-- /.container -->

  </main>
  <!-- End #main -->

<?php
  include_once('footer.php');
?>
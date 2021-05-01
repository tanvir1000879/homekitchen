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

              $sql= "SELECT * FROM kitchen WHERE status = 1";
              $result= $conn->query($sql);

              if($result->num_rows > 0) { ?>

                <div class="col-12 mb-3">
                  <h4>Chefs Are Waiting With <h1>Home Kitchens</h1></h4>
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
                    <div class="card border-0 shadow">
                      <div class="card-body mt-3">
                        <h3><b><?=$row['kitchen_name']?></b></h3>
                          <?php
                            $chef_id = $row['chef_id'];
                            $sql2 = "SELECT * FROM chefs WHERE chef_id = '$chef_id'";
                            $result2 = $conn->query($sql2);
                            if($result2->num_rows > 0) {
                              while($row2 = $result2->fetch_assoc()) { 
                                $chef_id = $row2['chef_id'];
                                $chef_name = $row2['chef_name'];
                                $chef_phone = $row2['chef_phone'];
                                ?>
                                <div class="d-flex justify-content-between align-items-center">
                                  <h6 class="m-0 text-title"><b>Chef name</b></h6>
                                  <span><b><?=$row2['chef_name']?></b></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                  <h6 class="m-0 text-title"><b>Phone</b></h6>
                                  <span><b><?=$row2['chef_phone']?></b></span>
                                </div>
                        <?php }
                            }
                          ?>
                        <div class="d-flex justify-content-between align-items-center">
                          <h6 class="m-0 text-title"><b>Address</b></h6>
                          <span><b><?=$row['kitchen_address']?></b></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <h6 class="m-0 text-title"><b>Location</b></h6>
                          <span><b><?=$row['location']?></b></span>
                        </div>
                        <div class="row mt-3">
                          <div class="col">
                            <a class="btn btn-block btn-custom" href="hire.php?kitchen_name=<?=$row['kitchen_name']?>&chef_id=<?=$chef_id?>&chef_name=<?=$chef_name?>&chef_phone=<?=$chef_phone?>">Hire Chef</a>
                          </div>
                          <div class="col">
                            <a class="btn btn-block btn-custom" href="kitchen-details.php?kitchen_id=<?=$row['kitchen_id']?>&kitchen_name=<?=$row['kitchen_name']?>">View Recipes</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

          <?php }

              }

          ?>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php
  include_once('footer.php');
?>
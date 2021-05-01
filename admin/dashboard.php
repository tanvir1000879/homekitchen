<?php include_once 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                          <?php
                            include_once '../dbcon.php';
                            $conn = connect();

                            $sql2 = "SELECT * FROM chefs WHERE status='1'";
                            $result2 = $conn->query($sql2);
                            $activeChef = mysqli_num_rows($result2);

                            $sql1 = "SELECT * FROM chefs WHERE status='2'";
                            $result1 = $conn->query($sql1);
                            $pendingChef = mysqli_num_rows($result1);

                            $sql3 = "SELECT * FROM chefs WHERE status='3'";
                            $result3 = $conn->query($sql3);
                            $deactiveChef = mysqli_num_rows($result3);

                          ?>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-0">
                                                Pending Chefs
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$pendingChef?></div>

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-0">
                                                Active Chefs
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$activeChef?></div>

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-0">
                                                Deactive Chefs
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$deactiveChef?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                <?php
                                  include_once '../dbcon.php';
                                  $conn = connect();

                                  $sql1 = "SELECT * FROM recipe WHERE status='1'";
                                  $result1 = $conn->query($sql1);
                                  $activeRecipe = mysqli_num_rows($result1);

                                  $sql2 = "SELECT * FROM recipe WHERE status='0'";
                                  $result2 = $conn->query($sql2);
                                  $deactiveRecipe = mysqli_num_rows($result2);
                                ?> 
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-0">
                                                Active Recipes
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$activeRecipe?></div>

                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-0">
                                                Deactive Recipes
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$deactiveRecipe?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <?php
                                            include_once '../dbcon.php';
                                            $conn = connect();

                                            $sql1 = "SELECT * FROM reports WHERE status='0'";
                                            $result1 = $conn->query($sql1);
                                            $pendingReport = mysqli_num_rows($result1);
                                          ?>
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Pending Reports
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$pendingReport?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-flag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<?php include_once 'footer.php'; ?>
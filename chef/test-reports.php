<?php include_once 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Test Reports</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Patient name</th>
                      <th>File Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                   $sql= " 
					SELECT test_report.test_report,user.user_name
					FROM test_report
					INNER JOIN user ON test_report.patient_id = user.id_user
					WHERE test_report.doctor_id=$id 
					ORDER BY test_report.id DESC";
					
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { 
					  
					  $test_report=$row['test_report'];
					  $test_report = explode('/', $test_report);
					  $test_report = end($test_report);
					  
					  ?>
                        <tr>
                          <td><?=$row['user_name']?></td>
                          <td><?php echo $test_report?></td>
                          <td><a class="btn btn-primary btn-sm" href="<?="../".$row['test_report']?>"><i class="fas fa-download"></i> Download</a></td>
                        </tr>
                <?php }

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
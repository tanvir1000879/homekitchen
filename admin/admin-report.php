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
              <h6 class="m-0 font-weight-bold text-primary">Pending Report</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Report Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM reports WHERE status = 0";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['name']?></td>
                          <td><?=$row['email']?></td>
                          <td><?=$row['subject']?></td>
                          <td><?=$row['message']?></td>
                          <td><?=$row['report_date']?></td>
                          <td>
                            <a class="btn btn-sm btn-primary mb-2" href="reply-report.php?report_id=<?=$row['report_id']?>&name=<?=$row['name']?>&email=<?=$row['email']?>">Replay</a>
                            <a class="btn btn-sm btn-success" href="mark-report.php?report_id=<?=$row['report_id']?>">Mark Solved</a>
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
              <h6 class="m-0 font-weight-bold text-primary">Solved Report</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Report Date</th>
                      <th>Reply</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                    $sql= "SELECT * FROM reports WHERE status = 1";
                    $result= $conn->query($sql);

                    if($result->num_rows > 0) {
                      foreach ($result as $row) { ?>
                        <tr>
                          <td><?=$row['name']?></td>
                          <td><?=$row['email']?></td>
                          <td><?=$row['subject']?></td>
                          <td><?=$row['message']?></td>
                          <td><?=$row['report_date']?></td>
                          <td><?=$row['reply']?></td>
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
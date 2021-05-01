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

          <?php
            if ($_GET['report_id']) {
              $report_id = $_GET['report_id'];
              $name = $_GET['name'];
              $email = $_GET['email'];
            }
          ?>

                <!-- Page Heading -->
                <form action="send-email.php" method="POST">
                  <input type="hidden" name="report_id" value="<?=$report_id?>">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="<?=$name?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">User Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" value="<?=$email?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="subject" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="message" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Send Email</button>
                    </div>
                  </div>
                </form>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<?php include_once 'footer.php'; ?>
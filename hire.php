<?php
  include_once('header.php');
?>

  <main id="main">


<!-- Page Content -->
<section>
<div class="container mt-5">

    <?php
      if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 3) { ?>
        <dic class="row">
          <div class="col text-center">
            <a class="btn btn-custom btn-lg" href="logout.php">Login as Customer to Hire</a>
          </div>
        </dic>
    <?php }
      elseif (isset($_SESSION['loggedin']) || $_SESSION['role'] == 3) { ?>
        

        <div class="section-title">
          <h2><span>Hiring</span> Summary</h2>
        </div>

    <?php
      if (isset($_GET['chef_id'])) {

        $user_id = $_SESSION['id'];

        $kitchen_name = $_GET['kitchen_name'];
        $chef_id = $_GET['chef_id'];
        $chef_name = $_GET['chef_name'];
        $chef_phone = $_GET['chef_phone'];

        include_once 'dbcon.php';
        $conn = connect();

        $sql= "SELECT * FROM users WHERE user_id = '$user_id'";
        $result= $conn->query($sql);

        while($row = $result->fetch_assoc()) {
          $user_name = $row['user_name'];
          $user_phone = $row['user_phone'];
          $user_address = $row['user_address'];
          ?>

        <div class="row">
          <div class="col-12 col-lg-6 mx-auto">

        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="hire-sub.php" method="POST">
              <input type="hidden" name="chef_id" value="<?=$chef_id?>">
              <input type="hidden" name="user_id" value="<?=$user_id?>">
              <div class="form-group row">
                <label for="uname" class="col-sm-4 col-form-label">Customer name:</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" name="uname" value="<?=$user_name?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="uphone" class="col-sm-4 col-form-label">Customer phone:</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" name="uphone" value="<?=$user_phone?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="eaddress" class="col-sm-4 col-form-label">Event address:</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" name="eaddress" value="<?=$user_address?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="edate">Event date</label>
                  <input type="date" class="form-control" name="edate" value="" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="etime">Event time</label>
                  <input type="time" class="form-control" name="etime" value="" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="category" class="col-sm-4 col-form-label">Event Category:</label>
                <div class="col-sm-8">
                  <select class="custom-select" name="category" required>
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
                <label for="people" class="col-sm-4 col-form-label">For people:</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" name="people" value="1" min="1" max="100" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Recipe details:</label>
                <div class="col-sm-8">
               <textarea class="form-control" name="recipe" rows="1" required></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="kname" class="col-sm-4 col-form-label">Kitchen name:</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" name="kname" value="<?=$kitchen_name?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="cname" class="col-sm-4 col-form-label">Chef name:</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" name="cname" value="<?=$chef_name?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="cphone" class="col-sm-4 col-form-label">Chef phone:</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" name="cphone" value="<?=$chef_phone?>">
                </div>
              </div>

              <button type="submit" class="btn btn-yellow btn-block mt-4">Hire Chef</button>
            </form>

         
          </div>
        </div>

          </div>
        </div>

  <?php
        }
      }
    ?>


    <?php }
    ?>


</div>
</section>
<!-- /.container -->

  </main>
  <!-- End #main -->

<script>

var today = new Date().toISOString().split('T')[0];
document.getElementsByName("edate")[0].setAttribute('min', today);

</script>

<?php
  include_once('footer.php');
?>
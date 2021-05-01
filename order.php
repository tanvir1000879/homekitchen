<?php
  include_once('header.php');
?>
<?php

if (isset($_GET['recipe_id'])) {
	$recipe_id = $_GET['recipe_id'];
	$_SESSION['recipe_id'] = $recipe_id;
}
elseif (isset($_SESSION['recipe_id'])) {
	$recipe_id = $_SESSION['recipe_id'];
}
elseif (!isset($_GET['recipe_id']) || !isset($_SESSION['recipe_id'])) { ?>
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col col-md-6 mx-auto">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Please select an recipe first !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  </div>
<?php
exit();
}

  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 3){
  	$_SESSION['msg_success'] = 'Please login or register to place order';
    header('location:login.php');
  }

?>

  <main id="main">

    <!-- ======= Banner Search Section ======= -->
    <section class="mt-5">
      <div class="container">

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

      	<div class="row mt-2">

    <?php

        include_once 'dbcon.php';
        $conn = connect();

        $sql= "SELECT * FROM recipe WHERE recipe_id = '$recipe_id'";
        $result= $conn->query($sql);

        while($row = $result->fetch_assoc()) { ?>
      		<div class="col-12 col-md-4">
      			<img class="img-fluid border" src="img/recipe/<?=$row['file']?>" alt="Generic placeholder image">
      		</div>

      		<div class="col">
				<div class="card">
				  <div class="card-body">
				    <h3 class="mt-0">Order details</h3>
					<form action="order-sub.php" method="POST">
					  <input type="hidden" id="recipe_id" name="recipe_id" value="<?=$row['recipe_id']?>">
					  <div class="form-group row">
					    <label for="input1" class="col-sm-3 col-form-label">Item</label>
					    <div class="col-sm-9">
					      <input type="text" readonly class="form-control-plaintext" id="input1" value="<?=$row['title']?>">
					    </div>
					  </div>
            <div class="form-group row">
              <label for="input0" class="col-sm-3 col-form-label">For</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="input0" value="<?=$row['for_people']?> person">
              </div>
            </div>
					  <div class="form-group row">
					    <label for="input3" class="col-sm-3 col-form-label">Delivery address</label>
					    <div class="col-sm-9">
					    <?php
					    	$id = $_SESSION['id'];
					    	$sql2= "SELECT * FROM users WHERE user_id = '$id'";
        					$result2= $conn->query($sql2);

        					while($row2 = $result2->fetch_assoc()) { ?>
        						<input type="text" readonly class="form-control-plaintext" id="input3" value="<?=$row2['user_address']?>">
        			  <?php }
					    ?>
					    </div>
					  </div>
            <div class="form-group row">
              <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="10" required onchange="orderFunction();">
              </div>
            </div>
					  <div class="form-group row">
					    <label for="price" class="col-sm-3 col-form-label">Unit Price</label>
					    <div class="col-sm-9">
					      <input type="text" readonly class="form-control-plaintext" id="price" name="price" value="<?=$row['price']?>">
					    </div>
					  </div>
            <div class="form-group row">
              <label for="totalprice" class="col-sm-3 col-form-label">Total Price</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="totalprice" name="totalprice" value="<?=$row['price']?>">
              </div>
            </div>
					<div class="custom-control custom-radio">
					  <input type="radio" id="bkash" name="payment" class="custom-control-input" checked="" value="bKash">
					  <label class="custom-control-label" for="bkash">Pay via bKash</label>
					  <div id="bkashdiv" class="border border-warning rounded p-2">
					  		<p class="m-0">Pay exactly <b id="totalprice2"><?=$row['price']?></b> TK to <b>01234567800</b> & enter transaction ID below:</p>
					  		<input type="text" class="form-control form-control-sm mt-1" id="tranid" name="tranid" placeholder="enter transaction id...">
					  </div>
					</div>
					<div class="custom-control custom-radio">
					  <input type="radio" id="cash" name="payment" class="custom-control-input" value="Cash">
					  <label class="custom-control-label mt-2" for="cash">Cash on delivery</label>
					</div>
					<button class="btn btn-custom btn-block mt-4">Place Order</button>
					</form>
				  </div>
				</div>
      		</div>
  <?php }
    ?>

      	</div>

      </div>
    </section>
    <!-- ======= Banner Search Section ======= -->

  </main>
  <!-- End #main -->

<script>
function orderFunction() {
  var quantity = document.getElementById('quantity').value;
  var price = document.getElementById("price").value;
  document.getElementById("totalprice").value = quantity * price;
  document.getElementById("totalprice2").innerHTML = quantity * price;
} 
</script>

<?php
  include_once('footer.php');
?>
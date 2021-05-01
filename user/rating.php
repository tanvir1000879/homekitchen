<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 3){
    header('location:../logout.php');
    exit();
  }
	
	$order_id = $_POST['order_id'];
	$recipe_id = $_POST['recipe_id'];
	$rating = $_POST['rating'];

    include_once '../dbcon.php';
    $conn = connect();

	$sql = "UPDATE orders SET rating = '$rating', status = 2 WHERE order_id = '$order_id'";
    if ($conn->query($sql)) {

    	$sql2 = "UPDATE recipe SET rating = rating + '$rating', rating_count = rating_count + 1 WHERE recipe_id = '$recipe_id'";
    	$result = $conn->query($sql2);

      $_SESSION['msg_success'] = "Order rated successfully";
      header('location:user-order.php');
      exit();
    }
    else {
      $_SESSION['msg_error'] = "Error occured";
      header('location:user-order.php');
      exit();
    }

?>
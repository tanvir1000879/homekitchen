<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 3){
    header('location:../logout.php');
    exit();
  }

  if ($_GET['order_id']) {

    $order_id = $_GET['order_id'];

    include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE orders SET status = 3 WHERE order_id = '$order_id'";
    if ($conn->query($sql)) {
      $_SESSION['msg_success'] = "Order cancelled";
      header('location:user-order.php');
      exit();
    }
    else {
      $_SESSION['msg_error'] = "Error occurred";
      header('location:user-order.php');
      exit();
    }

  }

?>
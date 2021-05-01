<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 1){
    header('location:../logout.php');
    exit();
  }

  if ($_GET['kitchen_id']) {

    $kitchen_id = $_GET['kitchen_id'];

    include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE kitchen SET status = 1 WHERE kitchen_id = '$kitchen_id'";
    if ($conn->query($sql)) {
      $_SESSION['msg_success'] = "Kitchen activated";
      header('location:admin-kitchen.php');
      exit();
    }
    else {
      $_SESSION['msg_error'] = "Error occurred";
      header('location:admin-kitchen.php');
      exit();
    }

  }

?>
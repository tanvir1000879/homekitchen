<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 1){
    header('location:../logout.php');
    exit();
  }

  if ($_GET['chef_id']) {

    $chef_id = $_GET['chef_id'];

    include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE chefs SET status = 3 WHERE chef_id = '$chef_id'";
    if ($conn->query($sql)) {
      $_SESSION['msg_success'] = "Account Deactivated";
      header('location:admin-chef.php');
      exit();
    }
    else {
      $_SESSION['msg_error'] = "Error occurred";
      header('location:admin-chef.php');
      exit();
    }

  }

?>
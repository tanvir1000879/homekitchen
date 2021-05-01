<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 2){
    header('location:../logout.php');
    exit();
  }

  if ($_POST['kitchen']) {
    $kitchen_name = $_POST['kitchen'];
    $address = $_POST['address'];
    $location = $_POST['location'];

    include_once '../dbcon.php';
    $conn = connect();

    $sql = "INSERT INTO kitchen (chef_id, kitchen_name, kitchen_address, location) VALUES ('$id', '$kitchen_name', '$address', '$location')";

    if ($conn->query($sql)) {
      $_SESSION['msg_success'] = "Kitchen created";
      header('location:my-kitchen.php');
      exit();
    }
    else {
      $_SESSION['msg_error'] = "Error occured";
      header('location:my-kitchen.php');
      exit();
    }
  }

?>
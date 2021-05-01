<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 2){
    header('location:../logout.php');
    exit();
  }

  if ($_POST['kitchen_id']) {

    $kitchen_id = $_POST['kitchen_id'];
    $kitchen_name = $_POST['kitchen'];

    include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE kitchen SET kitchen_name = '$kitchen_name' WHERE kitchen_id = '$kitchen_id' AND chef_id = '$id'";
    if ($conn->query($sql)) {
      $_SESSION['msg_success'] = "Kitchen name updated";
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
<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 1){
    header('location:../logout.php');
    exit();
  }

  if ($_GET['user_id']) {

    $user_id = $_GET['user_id'];

    include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE users SET status = 2 WHERE user_id = '$user_id'";
    if ($conn->query($sql)) {
      $_SESSION['msg_success'] = "Account deactivated";
      header('location:admin-user.php');
      exit();
    }
    else {
      $_SESSION['msg_error'] = "Error occurred";
      header('location:admin-user.php');
      exit();
    }

  }

?>
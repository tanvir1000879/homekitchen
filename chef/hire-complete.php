<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 2){
    header('location:../logout.php');
    exit();
  }

  if ($_GET['hire_id']) {

    $hire_id = $_GET['hire_id'];

    include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE hired SET status = 'Completed' WHERE hire_id = '$hire_id'";
    if ($conn->query($sql)) {
      $_SESSION['msg_success'] = "Apointment marked completed";
      header('location:chef-hire.php');
      exit();
    }
    else {
      $_SESSION['msg_error'] = "Error occurred";
      header('location:chef-hire.php');
      exit();
    }

  }

?>
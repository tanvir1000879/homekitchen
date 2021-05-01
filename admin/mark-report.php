<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 1){
    header('location:../logout.php');
    exit();
  }

  if ($_GET['report_id']) {

    $report_id = $_GET['report_id'];

    include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE reports SET status = 1 WHERE report_id = '$report_id'";
    if ($conn->query($sql)) {
      $_SESSION['msg_success'] = "Report marked as solved";
      header('location:admin-report.php');
      exit();
    }
    else {
      $_SESSION['msg_error'] = "Error occurred";
      header('location:admin-report.php');
      exit();
    }

  }

?>
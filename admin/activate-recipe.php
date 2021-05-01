<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 1){
    header('location:../logout.php');
    exit();
  }

  if ($_GET['recipe_id']) {

    $recipe_id = $_GET['recipe_id'];

    include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE recipe SET status = 1 WHERE recipe_id = '$recipe_id'";
    if ($conn->query($sql)) {
      $_SESSION['msg_success'] = "Recipe activated";
      header('location:admin-recipe.php');
      exit();
    }
    else {
      $_SESSION['msg_error'] = "Error occurred";
      header('location:admin-recipe.php');
      exit();
    }

  }

?>
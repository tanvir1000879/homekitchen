<?php
	session_start();

	$user_id = $_POST['user_id'];
  $uname = $_POST['uname'];
  $uphone = $_POST['uphone'];
  $eaddress = $_POST['eaddress'];
  $edate = $_POST['edate'];
  $etime = $_POST['etime'];
  $category = $_POST['category'];
  $people = $_POST['people'];
	$recipe = $_POST['recipe'];
  $kitchen_name = $_POST['kname'];
	$chef_id = $_POST['chef_id'];
  $chef_name = $_POST['cname'];
  $chef_phone = $_POST['cphone'];

  $eventdate = date("d.M.y", strtotime($edate));

  $eventtime  = date("h:i A", strtotime($etime));

	$datetime = $eventdate ." ". $eventtime;

	include_once 'dbcon.php';
  $conn = connect();

  $sql = "INSERT INTO hired (user_id, user_name, user_phone, user_address, event_date, event_category, for_people, recipe, kitchen_name, chef_id, chef_name, chef_phone) VALUES ('$user_id', '$uname', '$uphone', '$eaddress', '$datetime', '$category', '$people', '$recipe', '$kitchen_name', '$chef_id', '$chef_name', '$chef_phone')";

  	if ($conn->query($sql)) {
	    $_SESSION['msg_success'] = "Chef hired";
	    header('location:user/user-hire.php');
	    exit();
  	}
  	else {
  		$_SESSION['msg_error'] = "Error occured";
	    header('location:user/user-hire.php');
	    exit();
  	}
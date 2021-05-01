<?php
	session_start();

	$id = $_SESSION['id'];

	$recipe_id = $_POST['recipe_id'];
	$payment = $_POST['payment'];
	$tranid = $_POST['tranid'];
  $quantity = $_POST['quantity'];
  $totalprice = $_POST['totalprice'];

	if ($payment == 'bKash' && $tranid == '') {
	    $_SESSION['msg_error'] = "Please enter bKash transaction id";
	    header('location:order.php');
	    exit();
	}

	date_default_timezone_set("Asia/Dhaka");
	$time = date("d.M.y, h:i A");

	include_once 'dbcon.php';
  	$conn = connect();

  	// getting user details
  	$sql = "SELECT * FROM users WHERE user_id = '$id'";
  	$result = $conn->query($sql);
  	while($row = $result->fetch_assoc()) {
  		$uname = $row['user_name'];
  		$uemail = $row['user_email'];
  		$uphone = $row['user_phone'];
  		$uaddress = $row['user_address'];
  	}
  	// getting recipe details
  	$sql2 = "SELECT * FROM recipe WHERE recipe_id = '$recipe_id'";
  	$result2 = $conn->query($sql2);
  	while($row2 = $result2->fetch_assoc()) {
  		$kitchen_id = $row2['kitchen_id'];
  		$title = $row2['title'];
  		$location = $row2['location'];
  		$price = $row2['price'];
  		$file = $row2['file'];
  	}
  	// getting kitchen details & chef id
  	$sql3 = "SELECT * FROM kitchen WHERE kitchen_id = '$kitchen_id'";
  	$result3 = $conn->query($sql3);
  	while($row3 = $result3->fetch_assoc()) {
  		$chef_id = $row3['chef_id'];
  	}

  	$sql = "INSERT INTO orders (user_id, uname, user_email, user_address, user_phone, recipe_id, title, file, chef_id, order_time, payment, tran_id, quantity, price, total_price) VALUES ('$id', '$uname', '$uemail', '$uaddress', '$uphone', '$recipe_id', '$title', '$file', '$chef_id', '$time', '$payment', '$tranid', '$quantity', '$price', '$totalprice')";

  	if ($conn->query($sql)) {
	    $_SESSION['msg_success'] = "Order submitted";
	    header('location:order.php');
	    exit();
  	}
  	else {
  		$_SESSION['msg_error'] = "Error occured";
	    header('location:order.php');
	    exit();
  	}
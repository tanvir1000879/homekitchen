<?php
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	include_once 'dbcon.php';
    $conn = connect();

	date_default_timezone_set("Asia/Dhaka");
	$time = date("d.M.y, h:i A");

	$sql = "INSERT INTO reports (name, email, subject, message, report_date) VALUES ('$name', '$email', '$subject', '$message', '$time')";

	if ($conn->query($sql)) {
	    $_SESSION['msg_success'] = "Report sent";
	    header('location:index.php');
	    exit();
	}
	else {
		$_SESSION['msg_error'] = "Error occurred";
	    header('location:index.php');
	    exit();
	}

?>
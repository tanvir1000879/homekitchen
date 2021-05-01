<?php
	session_start();
	$text = $_POST['text'];
	$sender_id = $_SESSION['id'];
	$receiver_id = $_SESSION['receiver_id'];
	 
	if (!isset($_SESSION['receiver_id'])) {
		echo 2;
		exit();
	}	
	
	date_default_timezone_set("Asia/Dhaka");

	$time_stamp = date("d.M.y, h:i A");

	include_once '../dbcon.php';
	$conn = connect();

	$sql = "SELECT * FROM conversations WHERE user_id = '$receiver_id' AND chef_id = '$sender_id'";
	$result= $conn->query($sql);

	if($result->num_rows > 0) {
		$sql1 = "UPDATE conversations SET last_text = '$text', time_stamp = '$time_stamp', status_u = '1' WHERE user_id ='$receiver_id' AND chef_id = '$sender_id'";
		$conn->query($sql1);
	}
	elseif ($result->num_rows < 1) {
		$sql2 = "INSERT INTO conversations (user_id, chef_id, last_text, time_stamp, status_c) VALUES ('$receiver_id', '$sender_id', '$text', '$time_stamp', '0')";
		$conn->query($sql2);
	}

	$sql3 = "INSERT INTO messages (sender_id, receiver_id, text_message, time_stamp) VALUES ('$sender_id', '$receiver_id', '$text', '$time_stamp')";

	if ($conn->query($sql3)) {
		echo 1;
		exit();
	} else {
		echo 0;
		exit();
	}
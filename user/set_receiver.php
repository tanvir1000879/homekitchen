<?php
	session_start();
	$id = $_SESSION['id'];

	if(isset($_GET['receiver_id'])) {
		$_SESSION['receiver_id'] = $_GET['receiver_id'];
		$temp_receiver = $_GET['receiver_id'];

		include_once '../dbcon.php';
        $conn = connect();
        $sql = "UPDATE conversations SET status_u = 0 WHERE user_id = '$id' AND chef_id = '$temp_receiver'";
        $result = $conn->query($sql);
		header('location:messages.php');
	}
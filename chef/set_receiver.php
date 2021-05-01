<?php
	session_start();
	$id = $_SESSION['id'];

	if(isset($_GET['receiver_id'])) {
		$_SESSION['receiver_id'] = $_GET['receiver_id'];
		$temp_receiver = $_GET['receiver_id'];

		include_once '../dbcon.php';
        $conn = connect();
        $sql = "UPDATE conversations SET status_c = 0 WHERE chef_id = '$id' AND user_id = '$temp_receiver'";
        $result = $conn->query($sql);
		header('location:messages.php');
	}
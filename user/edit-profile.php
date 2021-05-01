<?php
	session_start();
	$id = $_SESSION['id'];
	$role=$_SESSION['role'];
	if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 3){
	  header('location:../logout.php');
	}

	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	
	if (is_numeric($name)) {
		$_SESSION['msg_error'] = 'Name cannot be only mumeric';
		header('location:user-profile.php');
		exit();
	}
	elseif (!is_numeric($phone)) {
		$_SESSION['msg_error'] = 'Phone no can be only mumeric';
		header('location:user-profile.php');
		exit();
	}

	include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE users SET user_name = '$name', user_address = '$address', user_phone = '$phone' WHERE user_id = '$id'";
    if ($conn->query($sql)) {
    	$_SESSION['msg_success'] = 'Profile updated';
        header('location:user-profile.php');
        exit();
    }
    else {
    	$_SESSION['msg_error'] = 'Action not completed';
        header('location:user-profile.php');
        exit();
    }
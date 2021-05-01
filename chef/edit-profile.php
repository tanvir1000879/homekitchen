<?php
	session_start();
	$id = $_SESSION['id'];
	$role=$_SESSION['role'];
	if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 2){
	  header('location:../logout.php');
	}

	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	
	if (is_numeric($name)) {
		$_SESSION['msg_error'] = 'Name cannot be only mumeric';
		header('location:chef-profile.php');
		exit();
	}
	elseif (!is_numeric($phone)) {
		$_SESSION['msg_error'] = 'Phone no can be only mumeric';
		header('location:chef-profile.php');
		exit();
	}

	include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE chefs SET chef_name = '$name', chef_address = '$address', chef_phone = '$phone' WHERE chef_id = '$id'";
    if ($conn->query($sql)) {
    	$_SESSION['msg_success'] = 'Profile updated';
        header('location:chef-profile.php');
        exit();
    }
    else {
    	$_SESSION['msg_error'] = 'Action not completed';
        header('location:chef-profile.php');
        exit();
    }
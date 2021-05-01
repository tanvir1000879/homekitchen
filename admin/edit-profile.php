<?php
	session_start();
	$id = $_SESSION['id'];
	$role=$_SESSION['role'];
	if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 1){
	  header('location:../logout.php');
	}

	$name = $_POST['name'];
	$email = $_POST['email'];
	
	if (is_numeric($name)) {
		$_SESSION['msg_error'] = 'Name cannot be only mumeric';
		header('location:chef-profile.php');
		exit();
	}

	include_once '../dbcon.php';
    $conn = connect();

    $sql = "UPDATE admin SET admin_name = '$name', admin_email = '$email' WHERE admin_id = '$id'";
    if ($conn->query($sql)) {
    	$_SESSION['msg_success'] = 'Profile updated';
        header('location:admin-profile.php');
        exit();
    }
    else {
    	$_SESSION['msg_error'] = 'Action not completed';
        header('location:admin-profile.php');
        exit();
    }
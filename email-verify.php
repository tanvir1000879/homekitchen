<?php
session_start();
	$email = $_GET['email'];
	$code = $_GET['code'];
	$role = $_GET['role'];

	include_once 'dbcon.php';
  	$conn = connect();

  	if ($role == 2) {
  		$sql = "SELECT * FROM chefs WHERE chef_email = '$email' AND code = '$code'";
  		$result = $conn->query($sql);

  		if ($result->num_rows > 0) {
  			$sql2 = "UPDATE chefs SET status = 2 WHERE chef_email = '$email' AND code = '$code'";
  			if ($conn->query($sql2)) {
  				$_SESSION['msg_success'] = "Email Verification Successful, please login to your account";
            	header('location:login.php');
              exit();
  			}
  		}
  		else {
  			$_SESSION['msg_error'] = "Email could not be verified";
            header('location:login.php');
            exit();
  		}
  	}

    else if ($role == 3) {
      $sql = "SELECT * FROM users WHERE user_email = '$email' AND code = '$code'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $sql2 = "UPDATE users SET status = 1 WHERE user_email = '$email' AND code = '$code'";
        if ($conn->query($sql2)) {
          $_SESSION['msg_success'] = "Email Verification Successful, please login to your account";
              header('location:login.php');
              exit();
        }
      }
      else {
        $_SESSION['msg_error'] = "Email could not be verified";
            header('location:login.php');
            exit();
      }
    }
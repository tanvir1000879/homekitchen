<?php
  session_start();

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;

  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $password = $_POST['pass'];
  $conpassword = $_POST['conpass'];

  $hashed_password = password_hash($conpassword, PASSWORD_DEFAULT);

  $temp_code  = time().md5($email).rand(50000,10000);
  $code = str_shuffle($temp_code);

  if (empty($name) || empty($email) || empty($address) || empty($phone) || empty($password) || empty($conpassword)) {
    $_SESSION['msg_error'] = "Please enter all data";
    header('location:cook-reg.php');
    exit();
  }

  include_once 'dbcon.php';
  $conn = connect();

  $sql = "SELECT * FROM chefs WHERE chef_email='$email' OR chef_phone='$phone'";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    $_SESSION['msg_error'] = "Email or phone no already registered";
    header('location:cook-reg.php');
    exit();
  }
  elseif ($result->num_rows == 0) {

$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$target_dir = "nid/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png"
&& $fileType != "pdf" ) {
  echo "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {


      $sql2 = "INSERT INTO chefs (chef_name, chef_email, chef_address, chef_phone, pw, nid, code)
      VALUES ('$name', '$email', '$address', '$phone', '$hashed_password', '$newfilename', '$code')";

      if ($conn->query($sql2)) {

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'tarequeahmed31@gmail.com';
            $mail->Password   = 'tanvirahmed';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('tarequeahmed31@gmail.com', 'Home Kitchen');
            $mail->addAddress($email, $name);
            $mail->addReplyTo('tarequeahmed31@gmail.com', 'Information');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body    = "<h4>Hi $name</h4> 
                            <p> Welcome to Home Kitchen. Please click on the link below to verify your Account.</p>
                            <a href='localhost/homekitchen/prop1/email-verify.php?email=$email&code=$code&role=2'>Click here</a>";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $_SESSION['msg_success'] = "Registration Successful, please check your email for verification";
            header('location:cook-reg.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }     
        
      }

  } else {
    $_SESSION['msg_error'] = "Sorry, there was an error uploading your file";
    header('location:cook-reg.php');
  }
}

  }

?>
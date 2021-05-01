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
    header('location:user-reg.php');
    exit();
  }

  include_once 'dbcon.php';
  $conn = connect();

  $sql = "SELECT * FROM users WHERE user_email='$email' OR user_phone='$phone'";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    $_SESSION['msg_error'] = "Email or phone no already registered";
    header('location:user-reg.php');
    exit();
  }
  elseif ($result->num_rows == 0) {

      $sql2 = "INSERT INTO users (user_name, user_email, user_address, user_phone, pw, code)
      VALUES ('$name', '$email', '$address', '$phone', '$hashed_password', '$code')";

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
                            <a href='localhost/homekitchen/prop1/email-verify.php?email=$email&code=$code&role=3'>Click here</a>";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $_SESSION['msg_success'] = "Registration Successful, please check your email for verification";
            header('location:user-reg.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }     
        
      }

  }

?>
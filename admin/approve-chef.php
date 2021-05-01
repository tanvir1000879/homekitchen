<?php
  session_start();
  $id = $_SESSION['id'];
  $role=$_SESSION['role'];
  if(!isset($_SESSION['loggedin']) || $_SESSION['role'] != 1){
    header('location:../logout.php');
    exit();
  }

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;

  $chef_id = $_GET['chef_id'];
  $chef_email = $_GET['chef_email'];

  include_once '../dbcon.php';
  $conn = connect();

      $sql2 = "UPDATE chefs SET status = 1 WHERE chef_id = '$chef_id'";

      if ($conn->query($sql2)) {

        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

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
            $mail->addAddress($chef_email);
            $mail->addReplyTo('tarequeahmed31@gmail.com', 'Information');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Account Approved';
            $mail->Body    = "<h4>Hi</h4> 
                            <p> Your Account has been approved, you can now login to your account and start selling.</p>
                            <a href='localhost/homekitchen/prop1/login.php'>Login here</a>";

            $mail->send();
            $_SESSION['msg_success'] = "Account approved & user notified by email";
            header('location:admin-chef.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
      }

?>
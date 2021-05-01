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

  if ($_POST) {


  	$report_id = $_POST['report_id'];
  	$name = $_POST['name'];
  	$email = $_POST['email'];
  	$subject = $_POST['subject'];
  	$message = $_POST['message'];

  include_once '../dbcon.php';
  $conn = connect();

      $sql = "UPDATE reports SET reply = '$message' WHERE report_id = '$report_id'";

      if ($conn->query($sql)) {

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
            $mail->addAddress($email, $name);
            $mail->addReplyTo('tarequeahmed31@gmail.com', 'Information');

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = "<h4>Hi $name</h4> 
                            <p>$message</p>
                            ";

            $mail->send();
            $_SESSION['msg_success'] = "Reporter replied by email";
            header('location:admin-report.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
      }


  }

?>
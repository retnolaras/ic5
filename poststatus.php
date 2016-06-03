<?php 
session_start();
if ($_SESSION['level']!="adminicrpv5") {
  header('location: index.php');
}

include ("includes/db_connect.php");
require_once 'includes/mail/class.phpmailer.php';
require_once 'includes/mail/class.smtp.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$tipe = isset($_GET['tipe']) ? $_GET['tipe'] : '';

if ($id=="" OR $tipe=="")
{
  header('location: admin.php');
  exit;
}


if ($tipe=="approval") {

    $email = isset($_GET['email']) ? $_GET['email'] : '';
    if ($email==""){ header('location: admin.php'); exit; }

                  $mail = new PHPMailer(); 
                  $mail->IsSMTP();                          
                  $mail->Host = "smtp.gmail.com"; 
                  //$mail->SMTPDebug  = 2; // testing
                  $mail->SMTPSecure   = 'ssl';
                  $mail->Port         = 465;
                  $mail->SMTPKeepAlive= true;
                  $mail->SMTPAuth     = true; 
                  $mail->CharSet      = 'utf-8';
                  $mail->Username     = 'no-reply@icrpv5.org'; // SMTP account username
                  $mail->Password     = 'icrpv52015'; //SMTP account password

                  $mail->SetFrom('admin@icrpv5.org'); //set the email from 
                  $mail->Subject = "Registration Approval - The 5th International Conference of Research on Plasmodium vivax Malaria"; //set email subject
                  $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
                  $body = "
                      <p>Dear fellow student/researcher/resident,</p>

                      <p>Your registration has been approved by administrator.</p>

                      <p>Please login <a href='".URL_HOST."login.php'>here for payment</a></p>
                      Regards,<br>
                      The 5th International Conference of Research on Plasmodium vivax Malaria

                      <p><strong>Note: This copy of email is for your archive. Don't reply this email.</strong></p>
                      "; //email message
                  //$body = eregi_replace("[\]", '', $body);
                  $mail->MsgHTML($body); //assign the message
                  $mail->AddAddress($email); // add recipient address

    if ($mail->Send()) {
       $insert1 = mysqli_query($mysqli, "UPDATE members SET approved=1 WHERE id='".$id."'");
    }
}elseif($tipe=="payment"){
  $insert1 = mysqli_query($mysqli, "UPDATE members SET paid=1 WHERE id='".$id."'");
}

if($insert1)
{
  //$info="success";
  header('location: admin.php');
}else{
  header('location: admin.php');
  exit;
}

?>
<?php
if(!isset($_POST['submit'])){
header("location:index.php");

}
require 'PHPMailer/PHPMailerAutoload.php';

$name=trim($_POST['name']);
$email=trim($_POST['email']);
$telephone=trim($_POST['telephone']);
$message=trim($_POST['message']);
$subject=trim($_POST['subject']);

$mail = new PHPMailer();
 $mail->isSMTP();
    
    $mail->Host = 'smtp.gmail.com';

    
    $mail->SMTPDebug = 2;
  //   $mail->AuthType = 'XOAUTH2';
    //set authentication to true
    $mail->SMTPAuth = true;

    //set login details for Gmail account
    $mail->Username = 'testthapathapa@gmail.com';
    $mail->Password = 'eyxd hfez gwwr rajv';

    //set type of protection
    $mail->SMTPSecure = 'ssl'; //or we can use TLS

    //set a port
    $mail->Port = 465; //or 587 if TLS

    //set subject
    $mail->Subject = $subject;

    //set HTML to true
    $mail->isHTML(true);

    //set body
    $mail->Body = 'Email from:- '.$email.'<br/>Phone number: '.$telephone.'<br />Message:-'.$message;

   
    //set who is sending an email
    $mail->setFrom($email,$name);

    //set where we are sending email (recipients)
    $mail->addAddress('Info.sshumanresource@gmail.com');
    //set where to reply to 
    $mail->addReplyTo($email,$name);

    //send an email
    if ($mail->send())
    header("Location: index.php"); 
    else
        echo $mail->ErrorInfo;
?>
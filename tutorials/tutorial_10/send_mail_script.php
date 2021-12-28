<?php
include('db_connection.php');
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

$recipient = $_POST['email'];
$exec = mysqli_query($connection, "SELECT * FROM users WHERE email = '$recipient'");

if (mysqli_num_rows($exec) > 0) {
    $row = mysqli_fetch_assoc($exec);
    define('url','http://localhost/php_training/tutorials/tutorial_10/reset_form.php');
    $token = password_hash($recipient, PASSWORD_BCRYPT).rand(10,9999);
    $expFormat = mktime(
    date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
    );
    $expDate = date("Y-m-d H:i:s",$expFormat);
    $update = mysqli_query($connection,"UPDATE users SET reset_link_token='$token',exp_date='$expDate' WHERE email='$recipient'");

    $mail = new PHPMailer();
    $mail->IsSMTP();

    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'nnay96804@gmail.com';
    $mail->Password   = 'hlaingwin12';

    $mail->IsHTML(true);
    $mail->AddAddress("$recipient", "recipient-name");
    $mail->SetFrom("nnay96804@gmail.com", "Record System");
    $mail->Subject = 'Click the following link your password to be reset';
    $content = "<b><a href='". url."?id=".$row['id']."&token=".$token."'>Reset password</a></b>";

    $mail->MsgHTML($content);
    if (!$mail->Send()) {
        echo 'Error while sending Email.';
        var_dump($mail);
    } else {
        header('location: index.php');
    }
} else {
    header('location: send_mail_form.php?wrong=1');
}


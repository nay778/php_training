<?php
include('db_connection.php');
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

$recipient = $_POST['email'];
$query = "SELECT * FROM users WHERE email = '$recipient'";
$exec = mysqli_query($connection, $query);

if (mysqli_num_rows($exec) > 0) {
    $row = mysqli_fetch_assoc($exec);
    $mail = new PHPMailer();
    $mail->IsSMTP();

    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "nnay96804@gmail.com";
    $mail->Password   = "hlaingwin12";

    $mail->IsHTML(true);
    $mail->AddAddress("$recipient", "recipient-name");
    $mail->SetFrom("nnay96804@gmail.com", "Record System");
    $mail->Subject = "Click the following link your password to be reset";
    $content = "<b><a href='http://localhost/php_training/tutorials/tutorial_10/reset_form.php?id=$row[id]'>Reset password</a></b>";

    $mail->MsgHTML($content);
    if (!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        header('location: index.php');
    }
} else {
    header('location: index.php?wrong=1');
}


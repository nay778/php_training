<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
if ($email === 'example@gmail.com' and $password === '123456') {
    $_SESSION['auth'] = ['username' => 'MgMg'];
    $_SESSION['email'] = ['useremail' => $email];
    header('location: profile.php');
} else {
    header('location: index.php?incorrect=1');
}

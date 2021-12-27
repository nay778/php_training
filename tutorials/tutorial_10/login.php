<?php
include('db_connection.php');
session_start();
$email = legal_input($_POST['email']);
$password = legal_input($_POST['password']);
//
$query = "SELECT * FROM users WHERE email = '$email'";
$exec = mysqli_query($connection, $query);
if (mysqli_num_rows($exec) > 0) {
    $row = mysqli_fetch_assoc($exec);
    if ($email == $row['email'] && password_verify($password, $row['password'])) {
        $_SESSION['auth'] = true;
        header('location: read_list.php');
    } else {
        header('location: index.php?incorrect=1');
    }
} else {
    header('location: index.php?incorrect=1');
}

// convert illegal input to legal input
function legal_input($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

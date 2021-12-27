<?php
include('db_connection.php');
$id = legal_input($_GET['id']);
//
$query = "SELECT * FROM users WHERE id = '$id'";
$exec = mysqli_query($connection, $query);
if (mysqli_num_rows($exec) > 0) {
    $password = legal_input($_POST['password']);
    $confirm = legal_input($_POST['confirm']);
    if ($password == $confirm) {
        $hash = password_hash($confirm, PASSWORD_BCRYPT);
        $query = "UPDATE users SET password = '$hash' WHERE id = '$id'";
        $exec = mysqli_query($connection, $query);
        header('location: index.php');
    } else {
        header("location: reset_form.php?id=$id&incorrect=1");
    }
} else {
    header('location: index.php?incorrect=1');
}

//// convert illegal input to legal input
function legal_input($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

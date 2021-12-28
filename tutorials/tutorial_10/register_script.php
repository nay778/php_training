<?php
session_start();
include('db_connection.php');

$email = legal_input($_POST['email']);
$exec = mysqli_query(
    $connection,
    "SELECT * FROM users WHERE email = '$email'"
);
if (mysqli_num_rows($exec) > 0) {
    header('location:index.php?wrong=1');
} else {
    insert_data($connection);
}

// insert query
function insert_data($connection)
{
    $name = legal_input($_POST['name']);
    $email = legal_input($_POST['email']);
    $password = legal_input($_POST['password']);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $date = date('Y-m-d H:i:s');
    $token = password_hash($email, PASSWORD_BCRYPT) . rand(10, 9999);
    $query = "INSERT INTO users (name,email,password,reset_link_token,created_at,updated_at) VALUES ('$name','$email','$hash','$token','$date','$date')";
    $exec = mysqli_query($connection, $query);
    if ($exec) {
        $_SESSION['auth'] = true;
        //var_dump($_SESSION);
        header('location: read_list.php');
    } else {
        $msg = 'Error: ' . $query . '<br>' . mysqli_error($connection);
        return $msg;
    }
}

// convert illegal input to legal input
function legal_input($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

<?php

include('db_connection.php');

    insert_data($connection);
    
// insert query
function insert_data($connection)
{
    $name = legal_input($_POST['name']);
    $email = legal_input($_POST['email']);
    $password = legal_input($_POST['password']);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO users (name,email,password,created_at,updated_at) VALUES ('$name','$email','$hash','$date','$date')";
    $exec = mysqli_query($connection, $query);
    if ($exec) {
        $_SESSION['auth'] = true;
        header('location:read_list.php');
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

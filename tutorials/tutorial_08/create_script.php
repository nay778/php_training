<?php

include('db_connection.php');

if (isset($_POST['create'])) {
    $maxsize = 2097152;
    if (($_FILES['file']['size'] >= $maxsize) || ($_FILES['file']['size'] == 0)) {
        header('location: create_form.php?size=choose');
    } else {
        insert_data($connection);
    }
}

// insert query
function insert_data($connection)
{
    $tmp = $_FILES['file']['tmp_name'];
    $logo = $_FILES['file']['name'];
    $name = legal_input($_POST['name']);
    $company = legal_input($_POST['company']);
    $producted = legal_input($_POST['producted']);
    $expired = legal_input($_POST['expired']);
    $date = date('Y-m-d H:i:s');
    $dir = 'images';
    $folder = $dir . '/' . $logo;
    move_uploaded_file($tmp, $folder);
    $query = "INSERT INTO medicine_details (logo,name,company,producted,expired,created_at,updated_at,status) VALUES ('$logo','$name','$company','$producted','$expired','$date','$date',1)";
    $exec = mysqli_query($connection, $query);
    if ($exec) {
        header('location:index.php');
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

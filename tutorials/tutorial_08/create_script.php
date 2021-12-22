<?php

include('db_connection.php');

if (isset($_POST['create'])) {

    $msg = insert_data($connection);
    header('location:index.php');
}

// insert query
function insert_data($connection)
{
    $tmp = $_FILES['file']['tmp_name'];
    $logo = $_FILES['file']['name'];
    $maxsize = 2097152;
    $dir = 'images';
    if (!empty($logo)) {
        if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            header('location: index.php?size=choose');
        } else {
            $folder = $dir . '/' . $logo;
            move_uploaded_file($tmp, $folder);
        }
    }

    $name = legal_input($_POST['name']);
    $company = legal_input($_POST['company']);
    $producted = legal_input($_POST['producted']);
    $expired = legal_input($_POST['expired']);
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO medicine_details (logo,name,company,producted,expired,created_at,updated_at,status) VALUES ('$logo','$name','$company','$producted','$expired','$date','$date',1)";
    $exec = mysqli_query($connection, $query);
    if ($exec) {

        $msg = 'Data was created sucessfully';
        return $msg;
    } else {
        $msg = 'Error: ' . $query . '<br>' . mysqli_error($connection);
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

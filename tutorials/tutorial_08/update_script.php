<?php
include('db_connection.php');
if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $editData = edit_data($connection, $id);
}

if (isset($_POST['update']) && isset($_GET['edit'])) {

    $id = $_GET['edit'];
    update_data($connection, $id);
}
function edit_data($connection, $id)
{
    $query = "SELECT * FROM medicine_details WHERE id= $id";
    $exec = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($exec);
    return $row;
}

// update data query
function update_data($connection, $id)
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
    $query = "UPDATE medicine_details 
            SET logo='$logo',
                name='$name',
                company= '$company',
                producted='$producted',
                expired='$expired',
                updated_at = '$date' WHERE id=$id";

    $exec = mysqli_query($connection, $query);

    if ($exec) {
        header('location:index.php');
    } else {
        $msg = 'Error: ' . $query . '<br>' . mysqli_error($connection);
        echo $msg;
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

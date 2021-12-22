<?php
include("db_connection.php");
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    delete_data($connection, $id);
}

// delete data query
function delete_data($connection, $id)
{

    $query = "UPDATE medicine_details SET status = 0 WHERE id=$id";
    $exec = mysqli_query($connection, $query);

    if ($exec) {
        header('location:index.php');
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($connection);
        echo $msg;
    }
}

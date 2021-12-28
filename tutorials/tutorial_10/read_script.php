<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('location: index.php');
    exit();
} else {
    include('db_connection.php');
    // fetch query
    function fetch_data($connection)
    {
        $query = "SELECT * from medicine_details WHERE status = 1 ORDER BY id DESC";

        $exec = mysqli_query($connection, $query);
        if (mysqli_num_rows($exec) > 0) {

            $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
            return $row;
        } else {
            return $row = [];
        }
    }
    $fetchData = fetch_data($connection);
}

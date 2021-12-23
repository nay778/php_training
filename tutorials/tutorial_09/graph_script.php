<?php
header('Content-Type: application/json');
include('db_connection.php');
$fetchData = fetch_data($connection);
echo json_encode($fetchData);
// fetch query
function fetch_data($connection)
{
    $query = "SELECT name,sale_rate from medicine_details WHERE status = 1 ORDER BY id";
    $result = mysqli_query($connection, $query);
    $data = [];
    foreach ($result as $row) {
        $data[] = $row;
    }
    return $data;
}

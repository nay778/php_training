<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph/Record System</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/library/jquery-3.5.1.min.js"></script>
    <script src="js/library/chart.min.js"></script>
    <script src="js/graph.js"></script>
</head>

<body>
    <div class="table-data">
        <div class="list-title">
            <h2>medicine sale rate</h2>
            <h2><a href="read_list.php"><i class="far fa-list-alt"></i></a></h2>
        </div>
        <canvas id="myChart"></canvas>
    </div>
</body>

</html>
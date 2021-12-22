<?php

$hostname     = "localhost";
$username     = "root";
$password     = "root";
$connection = mysqli_connect($hostname, $username, $password);
if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}
$database = "CREATE DATABASE IF NOT EXISTS medical";
$connection->query($database);
mysqli_select_db($connection, "medical");
$table = "CREATE TABLE IF NOT EXISTS `medicine_details` (
        `id` int(10) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `logo` varchar(255) DEFAULT NULL,
        `name` varchar(255) DEFAULT NULL,
        `company` varchar(255) DEFAULT NULL,
        `producted` varchar(55) DEFAULT NULL,
        `expired` varchar(55) DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime NOT NULL,
        `status` int(2) NOT NULL
        )";
$connection->query($table);

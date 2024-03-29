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
        `sale_rate` varchar(100) DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime NOT NULL,
        `status` int(2) NOT NULL
        )";
$users = "CREATE TABLE IF NOT EXISTS `users`(
    `id` int(10) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(250) NOT NULL,
    `status` int(11) NOT NULL DEFAULT '1',
    `reset_link_token` varchar(255) NOT NULL,
    `exp_date` datetime NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL
    )";
//unsigned အနှုတ်ကိန်းတွေ သိမ်းလို့မရတေ ာ့ပါဘူး။
$connection->query($table);
$connection->query($users);

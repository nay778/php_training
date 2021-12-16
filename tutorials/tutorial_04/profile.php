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
    <title>Profile</title>
</head>

<body>
    <div>
        <h1><?= $_SESSION['auth']["username"] ?></h1>
        <ul>
            <li>
                <b>Email:</b> <?= $_SESSION['email']["useremail"] ?>
            </li>
            <li>
                <b>Phone:</b> (09) 243 867 645
            </li>
            <li>
                <b>Address:</b> No. 321, Main Street, Yangon City
            </li>
        </ul>
        <br>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>
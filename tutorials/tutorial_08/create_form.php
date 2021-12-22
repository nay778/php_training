<?php
include('create_script.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form/Record System</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/library/jquery-3.5.1.min.js"></script>
    <script src="js/library/jquery-ui.js"></script>
    <script src="js/common.js"></script>
</head>

<body>
    <div class="form-detail">
        <div class="list-title">
            <h2>Add Record</h2>
            <h2><a href="index.php"><i class="far fa-list-alt"></i></a></h2>
        </div>
        <p class="r-color"><?php if (!empty($msg)) {
                                echo $msg;
                            } ?></p>
        <form method="post" action="create_script.php" enctype="multipart/form-data">
            <div class="logo">
                <?php if (isset($_GET['size'])) : ?>
                    <div class="r-color">
                        **File too large. File must be less than 2 megabytes
                    </div>
                <?php endif ?>
                <dvi class="file-upload">
                    <input type="file" name="file" accept="image/*" required>
                    <i class="fas fa-cloud-upload-alt"></i>
                </dvi>
                <h3>Choose Medicine Logo</h3>
            </div>
            <div>
                <label>Name</label>
                <input type="text" placeholder="Enter Medicine Name" name="name" required>
                <label>Company</label>
                <input type="text" placeholder="Enter Company Name" name="company" required>
                <label>Producted Date</label>
                <input type="text" placeholder="Enter Producted Date" name="producted" required id="datepicker">
                <label>Expired Date</label>
                <input type="text" placeholder="Enter Expired Date" name="expired" required id="datepick">
                <button type="submit" name="create">Save</button>
            </div>
        </form>
    </div>
</body>

</html>
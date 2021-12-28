<?php
include('update_script.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form/Record Sytem</title>
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
            <h2>Update Record</h2>
            <h2><a href="read_list.php"><i class="far fa-list-alt"></i></a></h2>
        </div>

        <p class="r-color">
            <?php if (!empty($msg)) {
                echo $msg;
            } ?>
        </p>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="update-logo">
                <?php if (isset($_GET['size'])) : ?>
                    <div class="r-color">
                        **File too large. File must be less than 2 megabytes
                    </div>
                <?php endif ?>
                <dvi class="update-upload">
                <?php 
                if(isset($editData)){
                    echo "<img src=images/" . $editData['logo'] . " alt='' id='exitImg'>";
                }
                ?>
                <img id="imgPreview" src="#" alt="preview" />
                <input type="file" name="file" accept="image/*" id="photo">
                </dvi>
                <h3><?php echo isset($editData) ? $editData['name'] : '' ?></h3>
            </div>
            <div>
                <label>Name</label>
                <input type="text" placeholder="Enter Medicine Name" name="name" required value="<?php echo isset($editData) ? $editData['name'] : '' ?>">
                <label>Company</label>
                <input type="text" placeholder="Enter Company Name" name="company" required value="<?php echo isset($editData) ? $editData['company'] : '' ?>">
                <label>Producted Date</label>
                <input type="text" placeholder="Enter Producted Date" name="producted" required id="datepicker" value="<?php echo isset($editData) ? $editData['producted'] : '' ?>">
                <label>Expired Date</label>
                <input type="text" placeholder="Enter Expired Date" name="expired" required id="datepick" value="<?php echo isset($editData) ? $editData['expired'] : '' ?>">
                <label>Sale Rate</label>
                <input type="text" placeholder="Enter Sale Rate" name="sale_rate" required value="<?php echo isset($editData) ? $editData['sale_rate'] : '' ?>">
                <button type="submit" name="update">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
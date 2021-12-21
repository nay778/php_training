<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR System</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    if (empty($_GET['value'])) {
        $value = "PRODUCT ID 23456";
    } else {
        $value = $_GET['value'];
    }
    ?>
    <div class="container">
        <div class="p-t">
            <h1>Enter Your Text</h1>
            <form action="qr_code.php" method="post">
                <input type="text" name="qr-id" class="qr-id" required value="<?= $value; ?>">
                <?php
                if (isset($_GET['status'])) {
                    echo "<sapn class='alert'>*your text is too long. please shorten it before generating qr code.</sapn>";
                }
                ?>
                <button type="submit" class="btn">Generate</button>
            </form>
        </div>
        <div class="qr-img">
            <?php
            if (isset($_GET['path'])) {
                echo "<img src=" . $_GET['path'] . " alt='qr_code'>";
            } else {
                echo "<img src='images/sample.png' alt='qr_code'>";
            }
            ?>
        </div>
    </div>
</body>

</html>
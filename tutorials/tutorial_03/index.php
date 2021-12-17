<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculater</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/library/jquery-3.5.1.min.js"></script>
    <script src="js/library/jquery-ui.js"></script>
    <script src="js/common.js"></script>
</head>

<body>
    <?php
    if (empty($_POST['dob'])) {
        $dob = "8/8/1988";
    } else {
        $dob = $_POST['dob'];
    }
    ?>
    <div class="container">
        <h1>Age Calculater</h1>
        <form action="" method="post" id="form">
            <input type="text" class="input_box" name="dob" id="datepicker" required value="<?= $dob; ?>">
            <button type="submit" name='submit' class="btn">Calculate</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $curr_date = date("m/d/y");
            $dob = $_POST['dob'];
            if (empty($dob)) {
                echo "<span class='error'>**select your date of birth</span>";
            } else {
                $age = date_diff(date_create($dob), date_create($curr_date));
                echo "<h2>Your Age is " . $age->format('%y') . " Years ";
            }
        }
        ?>
    </div>
</body>

</html>
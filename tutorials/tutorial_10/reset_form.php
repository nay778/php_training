<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record System</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrapper">
        <div>
            <h1>Reset Password</h1>
            <?php 
                if($_GET['id'] && $_GET['token']){
                    include('db_connection.php');
                    $exec = mysqli_query($connection,
                    "SELECT * FROM users WHERE id = '$_GET[id]' && reset_link_token = '$_GET[token]'");
                    $currentDate =  date('Y-m-d H:i:s');
                    if (mysqli_num_rows($exec) > 0) {
                        $row = mysqli_fetch_assoc($exec);
                        if($row['exp_date'] >= $currentDate){ ?>
                            <form action="reset_script.php?id=<?= $_GET['id']; ?> && token=<?= $_GET['token']; ?>" method="post">
                                <input type="password" name="password" placeholder="Password" required><br>
                                <input type="password" name="confirm" placeholder="Confirm Password" required><br>
                                <button type="submit" class="btn">
                                    Reset Password
                                </button>
                            </form>   
                    <?php    }
                    } else { 
                       echo "<p>This reset password link has been expired <a href='index.php'>Sign in →</a></p>"; 
                    }
                }
            ?>
            <?php if (isset($_GET['incorrect'])) : ?>
                <div class="error">
                    please type the same password
                </div>
            <?php endif ?>
        </div>
    </div>

</body>

</html>

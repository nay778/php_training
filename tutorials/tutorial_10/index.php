<?php
include('read_script.php');
?>
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
    <script src="js/library/jquery-3.5.1.min.js"></script>
    <script src="js/common.js"></script>
</head>

<body>

    <div class="wrapper">
        <div class="f-blk">
            <h1>Sign in</h1>
            <?php if (isset($_GET['incorrect'])) : ?>
                <div class="error">
                    Incorrect Email or Password
                </div>
            <?php endif ?>
            <?php if (isset($_GET['wrong'])) : ?>
                <div class="error">
                    Incorrect Email
                </div>
            <?php endif ?>
            <form action="login.php" method="post" class="login">
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" class="btn">
                    Login
                </button>
            </form>
            <a href="#" class="reset">Reset Password?</a> <a href="#" class="sign-up">Sign up?</a>
        </div>
        <div class="s-blk">
            <h1>Reset Password</h1>
            <form action="send_mail.php" method="post">
                <input type="email" name="email" placeholder="Email" required><br>
                <button type="submit" class="btn">
                    Send
                </button>
            </form>
        </div>
        <div class="t-blk">
            <h1>Register</h1>
            <form action="register_script.php" method="post" class="login">
                <input type="text" name="name" placeholder="Name" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" class="btn">
                    Register
                </button>
            </form>
            <p>Already have an account?<a href="index.php">Sign in →</a></p>
        </div>
    </div>

</body>

</html>
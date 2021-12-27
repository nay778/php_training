
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
        <div class="s-blk">
            <h1>Reset Password</h1>
            <?php if (isset($_GET['wrong'])) : ?>
                <div class="error">
                    Incorrect Email
                </div>
            <?php endif ?>
            <form action="send_mail_script.php" method="post">
                <input type="email" name="email" placeholder="Email" required><br>
                <button type="submit" class="btn">
                    Send
                </button>
            </form>
        </div>
    </div>

</body>

</html>
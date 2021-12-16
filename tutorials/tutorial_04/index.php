<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <h1>Welcome</h1>
        <?php if (isset($_GET['incorrect'])) : ?>
            <div class="error">
                Incorrect Email or Password
            </div>
        <?php endif ?>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" class="btn">
                Login
            </button>
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
</head>

<body>
    <div>
        <h1>Login</h1>
        <?php if (isset($_GET['incorrect'])) : ?>
            <div>
                Incorrect Email or Password
            </div>
        <?php endif ?>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" >
                Login
            </button>
        </form>
    </div>
</body>

</html>
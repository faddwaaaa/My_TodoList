<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navbar2.php"; ?>
    <div class="form-box">
        <h3>Login</h3>
        <form action="proses_login.php" method="post">
            <label for="">Username</label>
            <input type="text" name="username" id="" required>

            <label for="">Password</label>
            <input type="password" name="password" id="" required>

            <input type="submit" value="Login" style="background: #3b82f6; color: #fff;">

            <p>Pengguna baru? <a href="daftar.php" style="text-decoration: none;">Sign Up</a></p>
        </form>
    </div>
</body>
</html>
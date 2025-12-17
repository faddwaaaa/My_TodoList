<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna Baru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navbar2.php"; ?>
    <div class="form-box">
        <h3>Daftar Pengguna Baru</h3>
        <form action="proses_daftar.php" method="post">
            <p style="padding-right: 197px; font-size: 15px;">Nama Lengkap</p>
            <input type="text" name="name" id="" required>

            <p style="padding-right: 260px; font-size: 15px;">Email</p>
            <input type="email" name="email" id="" required>
            
            <p style="padding-right: 230px; font-size: 15px;">Username</p>
            <input type="text" name="username" id="" required>
            
            <p style="padding-right: 230px; font-size: 15px;">Password</p>
            <input type="password" name="password" id="" required>
            
            <p style="padding-right: 208px; font-size: 15px;">Tanggal Lahir</p>
            <input type="date" name="birth_date" id="" required>

            <input type="submit" value="Daftar" style="background: #3b82f6; color: #fff;">

            <p>Sudah punya akun? <a href="login.php" style="text-decoration: none;">Login Disini</a></p>
        </form>
    </div>
</body>
</html>
<?php
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];
$user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <style>
        .profil{
            width: 320px; 
            margin: 40px auto; 
            background: #fff; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        .profil h3{
            margin-bottom: 12px;
            margin-top: 7px;
        }
        .profil P {
            margin-bottom: 4px;
        }
        .profil button{
            margin-bottom: 8px;
            background: #555;
        }
    </style>
</head>
<body>
    <?php include "navbar.php"; ?>
    <div class="profil">
        <h3>Profil Saya</h3>
        <?php while($u = mysqli_fetch_assoc($user)) { ?>
            <p><strong>Nama :</strong> <?= $u['name'] ?></p>
            <p><strong>Tanggal Lahir :</strong> <?= $u['birth_date'] ?></p>
            <p><strong>Email :</strong> <?= $u['email'] ?></p>
            <p><strong>Username :</strong> <?= $u['username'] ?></p>
            <p><strong>Password :</strong> ****</p>
            <center><button><a href="index.php" style="text-decoration: none; color: #fff;">Kembali</a></button></center>
        <?php } ?>
    </div>
</body>
</html>
<?php
session_start();
require "koneksi.php";

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$kategori = mysqli_query($koneksi, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah TodoList</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navbar.php"; ?>
    <div class="form-box">
        <h3>Tambah TodoList</h3>
        <form action="proses_tambah.php" method="post">
            <label for="">Judul</label>
            <input type="text" name="title" id="" required>

            <label for="">Deskripsi</label>
            <textarea name="description" id="" rows="5" required></textarea>

            <label for="">Kategori</label>
            <select name="id_category" required>
                <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
                    <option value="<?= $k['id_category'] ?>"><?= $k['category'] ?></option>
                <?php } ?>
            </select>

            <label for="">Status</label>
            <select name="status" required>
                <option value="Pending">Pending</option>
                <option value="Done">Done</option>
            </select>
            
            <input type="hidden" name="id_user" value="<?= $id_user ?>">
            <button type="submit">Tambah</button>
        </form>
    </div>
</body>

</html>

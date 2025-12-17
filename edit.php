<?php
session_start();
require "koneksi.php";

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit();
}

$id_todo = $_GET['id_todo'];
$todo = mysqli_query($koneksi, "SELECT * FROM todo WHERE id_todo = '$id_todo'");
$t = mysqli_fetch_assoc($todo);

$kategori = mysqli_query($koneksi, "SELECT * FROM category")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit TodoList</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navbar.php"; ?>
    <div class="form-box">
        <h3>Edit TodoList</h3>
        <form action="proses_edit.php" method="post">
            <input type="hidden" name="id_todo" value="<?= $t['id_todo'] ?>">

            <label for="">Judul</label>
            <input type="text" name="title" value="<?= $t['title'] ?>">
            
            <label for="">Deskripsi</label>
            <textarea name="description" rows="4"><?= $t['description'] ?></textarea>

            <label for="">Kategori</label>
            <select name="id_category">
                <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
                    <option value="<?= $k['id_category'] ?>"
                    <?= $t['id_category'] == $k['id_category'] ? 'selected' : '' ?>>
                    <?= $k['category'] ?></option>
                <?php } ?>
            </select>
            
            <label for="">Status</label>
            <select name="status">
                <option value="Pending" <?= $t['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="Done" <?= $t['status'] == 'Done' ? 'selected' : '' ?>>Done</option>
            </select>

            <button type="submit">Edit</button>
        </form>
    </div>
</body>

</html>

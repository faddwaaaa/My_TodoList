<?php
session_start();
require "koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$id_user = $_SESSION['id_user'];

if (isset($_GET['fav'])) {
    $id = $_GET['fav'];
    if (!isset($_SESSION['favorite'][$id])) {
        $_SESSION['favorite'][$id] = 1;
    } else {
        $_SESSION['favorite'][$id] = $_SESSION['favorite'][$id] == 1 ? 0 : 1;
    }
    header("Location: index.php");  
    exit();
}

$favorit = isset($_GET['favorite']) && $_GET['favorite'] == 1;
$where = "WHERE t.id_user = '$id_user'";

if (!empty($_GET['category'])) {
    $where .= " AND t.id_category = '{$_GET['category']}'";
}
if (!empty($_GET['status'])) {
    $where .= " AND t.status = '{$_GET['status']}'";
}
$sql = "SELECT t.*, c.category AS nama_kategori
        FROM todo t
        LEFT JOIN category c ON t.id_category = c.id_category
        $where
        ORDER BY t.id_todo DESC";

$query   = mysqli_query($koneksi, $sql);
$kategori = mysqli_query($koneksi, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My TodoList</title>
</head>
<body>
    <?php include "navbar.php"; ?>
    <br>
    <div class="content" style="align-items: center;">
        <div class="category-filter">
            <form method="get">
                <label>Filter Kategori</label>
                <select name="category" onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
                        <option value="<?= $k['id_category'] ?>"
                        <?= @$_GET['category'] == $k['id_category'] ? 'selected' : '' ?>>
                        <?= $k['category'] ?>
                        </option>
                    <?php } ?>
                </select>
            </form>
        </div>
        <div class="status-filter">
            <form action="" method="get">
            <label>Filter Status</label>
                <select name="status" onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <option value="Pending" <?= @$_GET['status']=='Pending'?'selected':'' ?>>Pending</option>
                    <option value="Done" <?= @$_GET['status']=='Done'?'selected':'' ?>>Done</option>
                </select>
            </form>
        </div>
        <div class="status-favorite">
            <form action="" method="get">
            <label>Filter Bookmark</label>
                <select name="favorite" onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <option value="1" <?= @$_GET['favorite']=='1'?'selected':'' ?>>Favorite</option>
                </select>
            </form>
        </div>
        <center>
        <button onclick="window.print()" style="background: #5c5e5c;">Print</button>
        <br><a href="tambah.php"><button style="background: #0c8f3e; margin-top: 5px;">(+) Tambah</button></a><br><br></center>
    </div>
    <div class="todo-wrapper">
        <?php while ($todo = mysqli_fetch_assoc($query)) { ?>
        <?php
            $iniFavorit = $_SESSION['favorite'][$todo['id_todo']] ?? 0;
            if ($favorit && $iniFavorit != 1) continue;
        ?>
        <div class="todo-card <?= $todo['status']=='Done'?'done':'' ?>">
            <h4 style="<?= $todo['status']=='Done'?'text-decoration: line-through;':'' ?>"><?= $todo['title'] ?></h4>
            <small style="<?= $todo['status']=='Done'?'text-decoration: line-through;':'' ?>"><?= $todo['description'] ?></small>
            <p style="<?= $todo['status']=='Done'?'text-decoration: line-through;':'' ?>"><strong>Kategori: </strong><?= $todo['nama_kategori'] ?></p>
            <p style="<?= $todo['status']=='Done'?'text-decoration: line-through;':'' ?>"><strong>Status: </strong><?= $todo['status'] ?></p>
            <div class="todo-action">
                <a href="edit.php?id_todo=<?= $todo['id_todo'] ?>" class="edit">Edit</a>
                <a href="hapus.php?id_todo=<?= $todo['id_todo'] ?>" class="hapus">Hapus</a>
                <a href="?fav=<?= $todo['id_todo'] ?>" style="color: #e91e63;">
                    <?= $iniFavorit == 1 ? '❤️' : 'Favorit' ?>
                </a>
            </div>
    </div>
    <?php } ?>
</div>
</body>
</html> 

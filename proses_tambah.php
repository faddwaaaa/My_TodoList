<?php
session_start();
require "koneksi.php";

$title = $_POST['title'];
$description = $_POST['description'];
$id_category = $_POST['id_category'];
$status = $_POST['status'];
$id_user = $_SESSION['id_user'];

$sql = "INSERT INTO todo (title, description, id_category, status, id_user)
        VALUES
        ('$title','$description','$id_category','$status','$id_user')";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:index.php?tambah=sukses");
} else {
    header("location:index.php?tambah=gagal");
}
exit();
?>
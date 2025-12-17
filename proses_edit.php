<?php
session_start();
require "koneksi.php";

$id_todo = $_POST['id_todo'];
$title = $_POST['title'];
$description = $_POST['description'];
$id_category = $_POST['id_category'];
$status = $_POST['status'];

$sql = "UPDATE todo SET title = '$title', 
                        description = '$description', 
                        id_category = '$id_category', 
                        status = '$status', 
                        updated_at = now() 
                        WHERE id_todo = '$id_todo'";
$query = mysqli_query($koneksi, $sql);
if($query){
    header("location:index.php?edit=sukses");
} else {
    header("location:index.php?edit=gagal");
}
exit();
?>
<?php
require "koneksi.php";

$nama = $_POST['name'];
$date = $_POST['birth_date'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO user (name, birth_date, email, username, password)
        VALUES
        ('$nama','$date','$email','$username',md5('$password'))";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:login.php?daftar=sukses");
    exit;
} else {
    header("location:daftar.php?daftar=gagal");
    exit;
}
?>
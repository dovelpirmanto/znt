<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
 
// update data ke database
mysqli_query($mysqli,"UPDATE pengguna set username='$username', password='$password', level='$level' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:dashboard_admin.php");
 
?>
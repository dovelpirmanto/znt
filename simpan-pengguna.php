<?php
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
 
// menginput data ke database
mysqli_query($mysqli,"INSERT into pengguna values('$id','$username','$password','$level')");
 
// mengalihkan halaman kembali ke index.php
header("location:pengguna.php");
 
?>
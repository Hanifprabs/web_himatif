<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'inc/config.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password
$result = mysqli_query($koneksi,"SELECT * FROM users where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
   $data = mysqli_fetch_assoc($result);
   //menyimpan session
   $_SESSION['username'] = $username;
   $_SESSION['nama'] = $data['nama'];
   $_SESSION['status'] = "sudah_login";
   $_SESSION['id_login'] = $data['id'];
   header("location:user");
} else {
   header("location:login.php?pesan=Gagal login data tidak ditemukan.");
}
?>
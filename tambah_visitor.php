<?php
//koneksi database
include_once('./config/koneksi.php');

//menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$tanggal = date("Y-m-d H:i:s");

mysqli_query($koneksi,"INSERT into visitor values('','$nama','$tanggal')");
 
// mengalihkan halaman kembali ke index.php
header("location:hitung.php");
?>
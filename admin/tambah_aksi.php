<?php
session_start();
//koneksi database
include '../config/koneksi.php';

//menangkap data yang dikirim dari form

$merek =$_POST['merek'];
$type =$_POST['type'];
$processor =$_POST['processor'];
$ram =$_POST['ram'];
$memori =$_POST['memori'];
$kamera =$_POST['kamera'];
$baterai =$_POST['baterai'];
$ukuran_layar =$_POST['ukuran_layar'];
$harga =$_POST['harga'];
$tahun_rilis =$_POST['tahun_rilis'];
$teknologi =$_POST['teknologi'];
$dimensi =$_POST['dimensi'];
$berat =$_POST['berat'];
$sim =$_POST['sim'];
$tipe_layar =$_POST['tipe_layar'];
$resolusi =$_POST['resolusi'];
$os =$_POST['os'];
$chipset =$_POST['chipset'];
$kecepatan_cpu =$_POST['kecepatan_cpu'];
$gpu =$_POST['gpu'];
$card_slot =$_POST['card_slot'];
$kualitas_video =$_POST['kualitas_video'];
$wlan =$_POST['wlan'];
$bluetooth =$_POST['bluetooth'];
$gps =$_POST['gps'];
$usb =$_POST['usb'];
$fitur =$_POST['fitur'];
$tipe_baterai =$_POST['tipe_baterai'];
$charging =$_POST['charging'];
$warna =$_POST['warna'];
$gambar =$_FILES['gambar']['name'];
$temp =$_FILES['gambar']['tmp_name'];
$namabaru =$_POST['type'].$gambar;


//menginput data ke database
//$fotobaru = date('dmYHis').$gambar;
$path = "../admin/img/smartphone/".$namabaru;

if(move_uploaded_file($temp,$path)){
    $query = "INSERT INTO data_smartphone VALUES ('','$merek','$type','$processor','$ram','$memori','$kamera','$baterai','$ukuran_layar','$harga','$namabaru','$tahun_rilis','$teknologi','$dimensi','$berat','$sim','$tipe_layar','$resolusi','$os','$chipset','$kecepatan_cpu','$gpu','$card_slot','$kualitas_video','$wlan','$bluetooth','$gps','$usb','$fitur','$tipe_baterai','$charging','$warna')";
    $sql = mysqli_query($koneksi,$query);
    if ($sql){
        //mengalihkan halaman kembali ke index.php
        // session_start();
    $_SESSION['pesan'] = "Data berhasil ditambahkan"; 
    	header("location:../admin/data_smartphone.php");
    }else{
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='data_smarthpone.php'>Kembali Ke Form</a>";

    }
}else{
echo "Maaf, Gambar gagal untuk diupload.";
echo "<br><a href='data_smartphone.php'>Kembali Ke Form</a>";
}








?>
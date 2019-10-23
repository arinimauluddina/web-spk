<?php
session_start();
//koneksi database
include '../config/koneksi.php';

//menangkap data yang dikirim dari form

$id =$_POST['id'];
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
if(isset($_POST['ubah_foto'])){
    $gambar =$_FILES['gambar']['name'];
    $tmp =$_FILES['gambar']['tmp_name'];

    $fotobaru = date('dmYHis').$gambar;
    $path = "../admin/img/smartphone/".$fotobaru;




if(move_uploaded_file($tmp,  $path)){
    $query = "SELECT * FROM data_smartphone WHERE id_smartphone='$id'";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);

    if (is_file("../admin/img/smartphone/".$data['gambar']))
    unlink("../admin/img/smartphone/".$data['gambar']);

    $query = "UPDATE data_smartphone SET merek='$merek', type='$type', processor='$processor', ram='$ram', memori='$memori', kamera='$kamera', baterai='$baterai', ukuran_layar='$ukuran_layar', harga='$harga', gambar='$fotobaru', tahun_rilis='$tahun_rilis', teknologi='$teknologi', dimensi='$dimensi', berat='$berat',sim='$sim',tipe_layar='$tipe_layar', resolusi='$resolusi', os='$os', chipset='$chipset', kecepatan_cpu='$kecepatan_cpu',gpu='$gpu',card_slot='$card_slot',kualitas_video='$kualitas_video', wlan='$wlan',bluetooth='$bluetooth',gps='$gps',usb='$usb',fitur='$fitur',tipe_baterai='$tipe_baterai',charging='$charging',warna='$warna' where id_smartphone='$id'";
    $sql = mysqli_query($koneksi, $query);

    if($sql){
        $_SESSION['pesanedit'] = "Data berhasil di edit";
        header("location:../admin/data_smartphone.php");
    
}else{
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='edit_smartphone.php'>Kembali Ke Form</a>";
}
}else{
               
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='edit_smartphone.php'>Kembali Ke Form</a>";
}
} else{
    $query = "UPDATE data_smartphone SET merek='$merek', type='$type', processor='$processor', ram='$ram', memori='$memori', kamera='$kamera', baterai='$baterai', ukuran_layar='$ukuran_layar', harga='$harga' , tahun_rilis='$tahun_rilis', teknologi='$teknologi', dimensi='$dimensi', berat='$berat',sim='$sim',tipe_layar='$tipe_layar', resolusi='$resolusi', os='$os', kualitas_video='$chipset', kecepatan_cpu='$kecepatan_cpu',gpu='$gpu',card_slot='$card_slot',kualitas_video='$kualitas_video', wlan='$wlan',bluetooth='$bluetooth',gps='$gps',usb='$usb',fitur='$fitur',tipe_baterai='$tipe_baterai',charging='$charging',warna='$warna' where id_smartphone='$id'";
    $sql = mysqli_query($koneksi, $query);

   if($sql){
       header("location:../admin/data_smartphone.php");
   
}else{
   echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
   echo "<br><a href='edit_smartphone.php'>Kembali Ke Form</a>";
}
}


?>